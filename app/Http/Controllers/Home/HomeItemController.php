<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Service
use App\Services\Home\ItemServices;

class HomeItemController extends Controller
{
    private $itemServices;

    public function __construct(ItemServices $itemServices){
        $this->itemServices = $itemServices;
    }

    public function featuredItems(){
        return $this->itemServices->featuredItems();
    }

    public function popularItems(){
        return $this->itemServices->popularItems();
    }

    public function latestItems(){
        return $this->itemServices->latestItems();
    }

    public function discountedItems(){
        return $this->itemServices->discountedItems();
    }

    public function itemListShopPage(Request $request){
        return $this->itemServices->itemListShopPage($request);
    }
}
