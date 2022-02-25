<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeItemController extends Controller
{
    private $homeItemServices;

    public function __construct(HomeItemServices $homeItemServices){
        $this->services = $homeItemServices;
    }

    public function itemListHomePage(){
        return $this->productServices->itemListHomePage();
    }

    public function itemListShopPage(Request $request){
        return $this->productServices->itemListShopPage($request);
    }
}
