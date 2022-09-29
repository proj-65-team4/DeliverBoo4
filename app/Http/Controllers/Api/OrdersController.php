<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\CustomerOrderEmail;
use App\Mail\RestaurantOrderEmail;
use App\Order;
use App\Restaurant;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        
        $order->subtotal = 0;
        
        foreach($cart as $item){
            $order->subtotal +=  floatval($item['quantity']) * $item['price'];
        }

        $order->fill($data);
        $order->date_order = Carbon::now();
        $order->date_delivery = Carbon::now();
        $order->save();
        for ($i=0; $i <count($cart) ; $i++) { 


            $order->products()->attach(count($cart),['order_id'=>$order->id,'product_id'=>$cart[$i]['id'],'quantity'=>$cart[$i]['quantity']]);
        }
        
        Mail::to($order->customer_email)->send(new CustomerOrderEmail($order, $cart));

        foreach ($cart as $item) {
            $user = User::where("id",$item["user_id"])->first();
        }
        Mail::to($user->email)->send(new RestaurantOrderEmail($order, $cart,$user));
        
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
    


