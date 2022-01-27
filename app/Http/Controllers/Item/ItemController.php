<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Service
use App\Services\Item\ItemServices;
use App\Services\Item\ProductServices;

class ItemController extends Controller
{
    private $itemServices;
    private $productServices;

    public function __construct(ItemServices $itemServices, ProductServices $productServices){
        $this->services = $itemServices;
        $this->productServices = $productServices;
    }

    public function itemList(Request $request)
    {
        return $this->services->itemList($request);
    }

    public function itemGetById($id)
    {
        return $this->services->itemGetById($id);
    }

    public function itemCreate(Request $request)
    {
        return $this->services->itemCreate($request);
    }

    public function itemUpdate(Request $request, $id)
    {
        return $this->services->itemUpdate($request, $id);
    }

    public function itemDelete($id)
    {
        return $this->services->itemDelete($id);
    }

    public function itemListHomePage(){
        return $this->productServices->itemListHomePage();
    }

    public function itemListShopPage(Request $request){
        return $this->productServices->itemListShopPage($request);
    }
}
