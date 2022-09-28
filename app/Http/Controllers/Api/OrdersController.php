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
     
        $data = $request->all();

        $cart = $request->cart;
       /*  "subtotal","date_order","date_delivery" */
        $order= new Order();

        $order->fill($data);
        $order->subtotal = 20;
        $order->date_order = Carbon::now();
        $order->date_delivery = Carbon::now();
        $order->save();
        for ($i=0; $i <count($cart) ; $i++) { 


            $order->products()->attach(count($cart),['order_id'=>$order->id,'product_id'=>$cart[$i]['id'],'quantity'=>$cart[$i]['quantity']]);
        }
          
        /* 
        $payload = $request->payload;
        $nonce = $payload['nonce'];
        $status = Braintree_Transaction::sale([
            'amount' => 10000,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
            ]);
 */

        return response()->json($order);
    }
}
    


