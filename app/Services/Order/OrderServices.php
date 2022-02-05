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

    public function checkStock($orderItems){
        $stockOutItems = [];
        foreach($orderItems as $cartItem){
            $item = Item::find($cartItem->id)->first();
            if($item->inventory >= $cartItem->qty) {
                continue;
            }else{
                //add item id and send as respose with a message Item has been sold
                $data = [
                    'item_id'=>$item->id,
                    'item'=>$items->name
                ];
                array_push($stockOutItems, $data);
            }
        }
        return response(["data"=>$stockOutItems],200);
    }

    public function orderCreate($request){
        $orderItems = $request->items;
        $stockOutItems = checkStock($orderItems);
        if(count($stockOutItems) > 0){
            //return stock out items
            return $stockOutItems;
        }else{
            $order = $this->baseRI->storeInDB(
                $this->orderModel,
                [
                    'user_id' => auth()->user()->id,
                    'order_number' => date('md').date('is').mt_rand(10,100),
                    'payment_type' => $request->payment_type,
                    'amount' => $request->amount,
                    'discount' => $request->discount,
                    'tax' => $request->tax,
                    'payment' => $request->payment,
                    'note' => $request->note,
                    'status' => "pending",
                    'delivery_date' => $request->delivery_date,
                ]
            );
            if($order){
                $success = $this->orderItems($orderItems, $order->id);
                if($success){
                    return response(["message"=>"order created successfully"],200);
                }else{
                    return response(["message"=>"something went wrong, try again"],200);
                }
            }else{
                return response(["message"=>"something went wrong, try again"],200);
            }
        }
    }

    public function orderItems($orderItems, $orderId){
        foreach($orderItems as $orderItem){
            $this->baseRI->storeInDB(
                $this->orderItemModel,
                [
                    'order_id' => $orderId,
                    'product_id' => $orderItem->id,
                ]
            );
        }
        return true;
    }
}