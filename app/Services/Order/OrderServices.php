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

    public function checkStockOfOrderItem($orderItems){
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

    public function updateStockOfOrderItem($itemId, $qty){
        $item = Item::where('id', $itemId)->first();
        $item->inventory = $item->inventory - $qty;
        $item->save();
    }

    public function storeOrderItems($orderItems, $orderId){
        foreach($orderItems as $orderItem){
            $this->baseRI->storeInDB(
                $this->orderItemModel,
                [
                    'order_id' => $orderId,
                    'item_id' => $orderItem->item_id,
                ]
            );
            $this->updateStockOfOrderItem($orderItem->item_id, $orderItem->qty);
        }
        return true;
    }

    public function orderCreate($request){
        $orderItems = json_decode($request->order_items);
        $stockOutItems = $this->checkStockOfOrderItem($orderItems);
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
                $success = $this->storeOrderItems($orderItems, $order->id);
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

    public function orderItemList($id){
        //all order item list
        $orderItems = OrderItem::where('order_id', $id)->get();
        return $orderItems;
        
    }

    public function orderList($request, $limit){
        //all order list
        $orders = Order::all();
        return $orders;
        
    }

    public function orderListInCustomerPortal(){
        //authorised customer's order list
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return $orders;
    }

    public function orderStatusUpdate($request, $id){
        //update the order status
        $order = Order::where('id', $id)->first();
        $order->status = $request->order_status;
        $order->save();
        return response(["message"=>"order status updated successfully"],200);
    }

    public function orderCancelHandler($request, $id){
        // take order number and restore the items of that order
        $order = Order::where('id', $id)->first();
        // find item and update stock
        return response(["message"=>"Cancelled order items restored successfully"],200);
    }
}