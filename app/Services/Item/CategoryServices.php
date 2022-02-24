<?php

namespace App\Services\Item;

use Illuminate\Support\Str;

//Services
use App\Services\BaseServices;
use App\Services\Validation\Item\CategoryValidation;

//Models
use App\Models\Category;

//Utilities
use App\Utilities\FileUtilities;

class CategoryServices extends BaseServices{
    public static $imagePath = 'images/category';
    public static $explode_at = "category/";

    private  $categoryModel = Category::class;

    public function categoryList($request){
        $countObj = 'item';
        $prop1 = 'name';
        if ($request->has('q')){
            $category = $this->filterRI->filterBy1PropWithCount($this->categoryModel, $request->q, $request->limit, $countObj, $prop1);
        }else{
            $category = $this->baseRI->listwithCount($this->categoryModel, $request->limit, $countObj);
        }
        return $category;
    }

    public function categoryGetById($id){
        $category = $this->baseRI->findById($this->categoryModel, $id);
        if($category){
            $subCategories = $this->baseRI->findByIdGet($this->categoryModel, $id, 'parent_id');
            $data = [
                'category' => $category,
                'subcategories' => $subCategories,
            ];
            return response($data,201);
        }else{
            return response(["failed"=>'category not found'],404);
        }
    }

    public function categoryCreate($request){
        if($request->parent_id == null){
            $fields = CategoryValidation::validate1($request);
            $parent_id = 0;
        }
        else{
            $fields = CategoryValidation::validate2($request);
            $parent_id = $fields['parent_id'];
        }
        $image = FileUtilities::fileUpload($request, url(''), self::$imagePath, false, false, false);
        $category = $this->baseRI->storeInDB(
            $this->categoryModel,
            [
                'parent_id' => $parent_id,
                'name' => $fields['name'],
                'slug' => Str::slug($fields['name']),
                'image' => $image,
            ]
        );
        if($category){
            return response($category,201);
        }else{
            return response(["failed"=>'Server Error'],500);
        }
    }

    public function categoryUpdate($request, $id){
        $category = $this->baseRI->findById($this->categoryModel, $id);
        if($category){
            if($request->parent_id == null){
                $parent_id = 0;
                if($category->name==$request->name){
                    $fields = CategoryValidation::validate3($request);
                }
                else{
                    $fields = CategoryValidation::validate1($request);
                }
            }
            else{
                if($category->name==$request->name){
                    $fields = CategoryValidation::validate4($request);
                    $parent_id = $fields['parent_id'];
                }
                else{
                    $fields = CategoryValidation::validate2($request);
                }
            }
            $exImagePath = $category->image;
            $image = FileUtilities::fileUpload($request, url(''), self::$imagePath, self::$explode_at, $exImagePath, true);
            return [
                'parent_id' => $parent_id,
                'name' => $fields['name'],
                'slug' => Str::slug($fields['name']),
                'image' => $image,
            ];
            $category->update(
                [
                    'parent_id' => $parent_id,
                    'name' => $fields['name'],
                    'slug' => Str::slug($fields['name']),
                    'image' => $image,
                ]
            );
            return response($category,201);
        }else{
            return response(["failed"=>'Category not found'],404);
        }
    }

    public function categoryDelete($id){
        $category = $this->baseRI->findById($this->categoryModel, $id);
        if($category){
            $category->delete();
            return response(["done"=>'category Deleted Successfully'],200);
        }else{
            return response(["failed"=>'category not found'],404);
        }
    }
}
