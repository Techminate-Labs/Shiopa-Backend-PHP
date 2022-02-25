<?php

namespace App\Services\Order;

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
        foreach($orderItems as $orderItem){
            $item = Item::where('id', $orderItem->item_id)->first();
            if($item->inventory >= $orderItem->qty) {
                continue;
            }else{
                $data = [
                    'item_id'=>$item->id,
                    'item'=>$item->name
                ];
                array_push($stockOutItems, $data);
            }
        }
        return $stockOutItems;
    }

    public function orderCreate($request){
        $orderItems = json_decode($request->order_items);
        $stockOutItems = $this->checkStock($orderItems);
        if(count((array)$stockOutItems) > 0){
            return response([
                "message"=>"item stock out",
                "stock_out_items" => $stockOutItems
            ],200);
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
                    return response(["message"=>"order created successfully"],201);
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
                    'item_id' => $orderItem->item_id,
                ]
            );
            $this->updateStock($orderItem->item_id, $orderItem->qty);
        }
        return true;
    }

    public function updateStock($itemId, $qty){
        $item = Item::where('id', $itemId)->first();
        $item->inventory = $item->inventory - $qty;
        $item->save();
    }
}