<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Service
use App\Services\Order\OrderServices;

class OrderController extends Controller
{
    private $orderServices;

    public function __construct(OrderServices $orderServices){
        $this->orderServices = $orderServices;
    }

    public function checkStock(Request $request)
    {
        return $this->services->checkStock($request);
    }
}
