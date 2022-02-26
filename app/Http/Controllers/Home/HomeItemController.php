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

    public function itemListHomePage(){
        return $this->itemServices->itemListHomePage();
    }

    public function itemListShopPage(Request $request){
        return $this->itemServices->itemListShopPage($request);
    }
}
