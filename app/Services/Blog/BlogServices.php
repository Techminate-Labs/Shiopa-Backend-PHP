<?php

namespace App\Services\Item;

use Illuminate\Support\Str;

//Interface
use App\Contracts\Item\BlogRepositoryInterface;

class BlogServices{
    
    private $repositoryInterface;

    public function __construct(BlogRepositoryInterface $repositoryInterface){
        $this->ri = $repositoryInterface;
    }

    public function blogList($request){
        if ($request->has('searchText')){
            $blog = $this->ri->blogSearch($request->searchText);
        }else{
            $blog = $this->ri->blogList();
        }
    }

    public function blogGetById($id){
        $blog = $this->ri->blogGetById($id);
        if($blog){
            return $blog;
        }else{
            return response(["failed"=>'blog not found'],404);
        }
    }

    public function blogCreate($request){
        $fields = $request->validate([
            'name'=>'required|string|unique:blogs,name',
        ]);

        $blog = $this->ri->blogCreate([
            'name' => $fields['name'],
            'slug' => Str::slug($fields['name'])
        ]);

        return response($blog,201);
    }

    public function blogUpdate($request, $id){
        $fields = $request->validate([
            
        ]);

        $blog = $this->ri->blogGetById($id);
        if($blog){
            $data = $request->all();
            if($blog->name==$data['name']){
                $fields = $request->validate([
                    'name'=>'required|string|max:255',
                ]);
            }
            else{
                $fields = $request->validate([
                    'name'=>'required|string|max:255|unique:blogs,name',
                ]);
            }
            $data['slug'] = Str::slug($fields['name']);
            $blog->update($data);
            return response($blog,201);
        }else{
            return response(["failed"=>'blog not found'],404);
        }
    }

    public function blogDelete($id){
        $blog = $this->ri->blogGetById($id);
        if($blog){
            $blog->delete();
            return response(["done"=>'blog Deleted Successfully'],200);
        }else{
            return response(["failed"=>'blog not found'],404);
        }
    }
}