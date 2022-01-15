<?php

namespace App\Services\User;

//Services
use App\Services\BaseServices;

//Format

//Models
use App\Models\Category;

class CategoryServices extends BaseServices{

    private $categoryModel = Category::class;

    public function categoryList($request){
        $this->logCreate($request);
        if ($request->has('q')){
            $categories = $this->filterRI->filterBy1PropPaginated($this->categoryModel, $request->q, $request->limit, 'name');
        }else{
            $categories = $this->baseRI->listWithPagination($this->categoryModel, $request->limit);
        }
        if($categories){
            return $categories;
        }else{
            return response(["message"=>'category not found'],404);
        }
    }

    public function categoryGetById($request, $id){
        $this->logCreate($request);
        $category = $this->baseRI->findById($this->categoryModel, $id);
        if($category){
            return $category;
        }else{
            return response(["message"=>'category not found'],404);
        }
    }

    public function categoryCreate($request){
        $this->logCreate($request);
        $request->validate([
            'name'=>'required',
            'permissions'=>'required'
        ]);
        $data = $request->all();

        $category = $this->baseRI->storeInDB($this->categoryModel, $data);
        return response($category,201);
    }

    public function categoryUpdate($request, $id){
        $this->logCreate($request);
        $request->validate([
            'name'=>'required',
            'permissions'=>'required'
        ]);
        $category = $this->baseRI->findById($this->categoryModel, $id);
        if($category){
            $data = $request->all();
            $category->update($data);
            return response($category,201);
        }else{
            return response(["message"=>'category not found'],404);
        }
    }

    public function categoryDelete($request, $id){
        $this->logCreate($request);
        $category = $this->baseRI->findById($this->categoryModel, $id);
        if($category){
            $category->delete();
            return response(["message"=>'Delete Successfull'],200);
        }else{
            return response(["message"=>'category not found'],404);
        }
    }

}
