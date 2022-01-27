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
        //filter by price
        //filter by brand
        //filter by alphabet

        return Item::all();
    }
}