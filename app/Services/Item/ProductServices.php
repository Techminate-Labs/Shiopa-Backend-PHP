<?php

namespace App\Services\Item;

use Illuminate\Support\Str;

//Repository
use App\Repositories\ItemRepository;

//Services
use App\Services\BaseServices;
use App\Services\Validation\Item\ItemValidation;

//Utilities
use App\Utilities\FileUtilities;

//Format
use App\Format\ItemFormat;

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

    public function itemListHomePage(){
        $sections = Section::latest()->get();
        $homepageItems = [];
        foreach($sections as $section){
            $items = Item::where('section_id',$section->id)->limit(8)->get();
            $data = [
                'section'=>$section,
                'items'=>$items
            ];
            array_push($homepageItems, $data);
        }
        return response(["data"=>$homepageItems],200);
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