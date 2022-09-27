<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        $orders = Order::all();

        return response()->json($orders);
    }
    public function store(Request $request){
     
        $data = $request->validated();


       /*  "subtotal","date_order","date_delivery" */
        $order= new Order();

        $order->fill($data);
        $order->subtotal = 20;
        $order->date_order = Carbon::now();
        $order->date_delivery = Carbon::now();


        $order->save();



        return redirect()->;
    }
}
