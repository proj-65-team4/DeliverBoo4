<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;

        // SELECT * from orders join order_product on orders.id = order_product.order_id 
        // join products on order_product.product_id = products.id 
        // join users on products.user_id = users.id 
        // where users.id = 5;
        
        $orders =  DB::table('orders')
        ->join('order_product' , 'orders.id' , '=' , 'order_product.order_id')
        ->join('products' , 'order_product.product_id' , '=' , 'products.id')
        ->join('users' , 'products.user_id' , '=' , 'users.id')
        ->where('users.id' , '=' , $id)
        ->select('orders.*')
        ->get();

        
        return view("admin.orders.index", compact("orders"));
    }

    public function statistic() {
        $id = Auth::user()->id;
        $orders = $orders =  DB::table('orders')
        ->join('order_product' , 'orders.id' , '=' , 'order_product.order_id')
        ->join('products' , 'order_product.product_id' , '=' , 'products.id')
        ->join('users' , 'products.user_id' , '=' , 'users.id')
        ->where('users.id' , '=' , $id)
        ->select('orders.*')
        ->get();

        $total = 0;
        foreach($orders as $order){
            $total += $order->subtotal;
        }

        return view("admin.orders.statistic", compact("total", "orders"));
    }
    
    /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
    public function show($id)
    {
        $orders = Order::findOrFail($id);

        return view("admin.orders.show", compact("orders"));
    }
}
