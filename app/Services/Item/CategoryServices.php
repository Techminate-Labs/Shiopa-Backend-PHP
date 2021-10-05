<?php

namespace App\Services\Item;

use Illuminate\Support\Str;

//Interface
use App\Contracts\Item\CategoryRepositoryInterface;

//Utilities
use App\Utilities\FileUtilities;

//Resources
use App\Http\Resources\PaginationResource;

class CategoryServices{
    
    private $repositoryInterface;
    private $fileUtilities;
    public static $imagePath = 'images/category';
    public static $explode_at = "category/";

    public function __construct(
        CategoryRepositoryInterface $repositoryInterface,
        FileUtilities $fileUtilities){
        $this->ri = $repositoryInterface;
        $this->fileUtilities = $fileUtilities;
    }

    public function categoryList($request){
        if ($request->has('q')){
            $category = $this->ri->categorySearch($request->q, $request->limit);
        }else{
            $category = $this->ri->categoryList($request->limit);
        }
        return $category;
        // return new PaginationResource($category);
    }

    public function categoryGetById($id){
        $category = $this->ri->categoryGetById($id);
        if($category){
            return $category;
        }else{
            return response(["failed"=>'category not found'],404);
        }
    }

    public function categoryCreate($request){
        $fields = $request->validate([
            'name'=>'required|string|unique:categories,name',
            'parent_id'=>'required',
        ]);

        //image upload
        $categoryImage = $this->fileUtilities->fileUpload($request, url(''), self::$imagePath, false, false, false);

        $category = $this->ri->categoryCreate([
            'parent_id' => $fields['parent_id'],
            'name' => $fields['name'],
            'slug' => Str::slug($fields['name']),
            'image' => $categoryImage
        ]);

        return response($category,201);
    }

    public function categoryUpdate($request, $id){
        $category = $this->ri->categoryGetById($id);
        if($category){
            $data = $request->all();
            if($category->name==$data['name']){
                $fields = $request->validate([
                    'name'=>'required|string|max:255',
                    'parent_id'=>'required',
                ]);
            }
            else{
                $fields = $request->validate([
                    'name'=>'required|string|max:255|unique:categories,name',
                ]);
            }
            $data['slug'] = Str::slug($fields['name']);
            //image upload
            $exImagePath = $category->image;
            $categoryImage = $this->fileUtilities->fileUpload($request, url(''), self::$imagePath, self::$explode_at, $exImagePath, true);
            $data['image'] = $categoryImage;
            $category->update($data);
            return response($category,201);
        }else{
            return response(["failed"=>'Category not found'],404);
        }
    }

    public function categoryDelete($id){
        $category = $this->ri->categoryGetById($id);
        if($category){
            $category->delete();
            return response(["done"=>'category Deleted Successfully'],200);
        }else{
            return response(["failed"=>'category not found'],404);
        }
    }
}