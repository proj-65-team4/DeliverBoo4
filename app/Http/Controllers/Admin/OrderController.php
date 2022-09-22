<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        
        return view("admin.orders.index", compact("orders"));
    }

    public function statistic() {

        $orders = Order::all();
        $total = 0;
        foreach($orders as $order){
            $total += $order->subtotal;
        }

        return view("admin.orders.statistic", compact("orders", "total"));
    }
}
