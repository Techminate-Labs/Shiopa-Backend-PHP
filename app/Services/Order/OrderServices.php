<?php

namespace App\Services\Item;

use Illuminate\Support\Str;

//Services
use App\Services\BaseServices;

//Models
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;

//Utilities
use App\Utilities\FileUtilities;

class OrderServices extends BaseServices{

    private $orderModel = Order::class;
    private $orderItemModel = OrderItem::class;
    private $itemModel = Item::class;

    public function checkStock($request){
        $cartItems = $request->items;
        foreach($cartItems as $cartItem){
            $item = Item::find($cartItem->id)->first();
            if($item->inventory >= $cartItem->qty) {
                continue;
            }else{
                //add item id and send as respose with a message Item has been sold
                return false;
            }
        }
        return 'ok';
    }
}