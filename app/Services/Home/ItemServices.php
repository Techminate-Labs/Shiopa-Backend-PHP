<?php

namespace App\Services\Home;

//Repository
use App\Repositories\ItemRepository;

//Services
use App\Services\BaseServices;

//Models
use App\Models\Item;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Section;

class ItemServices extends BaseServices{

    private $itemModel = Item::class;
    private $categoryModel = Category::class;
    private $brandModel = Brand::class;
    private $supplierModel = Supplier::class;

    public function featuredItems(){
        return Item::where('section','featured')->limit(8)->get();
    }

    public function popularItems(){
        return Item::where('section','popular')->limit(8)->get();
    }

    public function latestItems(){
        return Item::where('section','latest')->limit(8)->get();
    }

    public function discountedItems(){
        return Item::where('section','discounted')->limit(8)->get();
    }

    public function itemListShopPage(){

        //filter by category
        if($request->has('category_id')){
            $item = Item::where('category_id',$category_id)->get();
        }
        //filter by price
        if($request->has('price')){
            $item = Item::where('price',$price)->get();
        }
        //filter by brand
        if($request->has('brand_id')){
            $item = Item::where('brand_id',$brand_id)->get();
        }
        //filter by alphabet
        if($request->has('q')){
            $item = Item::where('name',$q)->get();
        }

        return $item;
    }
}