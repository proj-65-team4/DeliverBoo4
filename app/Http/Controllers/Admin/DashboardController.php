<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
public function index()
{
    $id = Auth::user()->id;
    $user = Auth::user();
    $totalProducts = Product::where('user_id', $user->id)->count();

    $dataProducts = Product::orderBy("name", "asc")->where('user_id', $user->id)->paginate(10);

    $orders = DB::table('orders')
    ->join('order_product' , 'orders.id' , '=' , 'order_product.order_id')
    ->join('products' , 'order_product.product_id' , '=' , 'products.id')
    ->join('users' , 'products.user_id' , '=' , 'users.id')
    ->where('users.id' , '=' , $id)
    ->select('orders.*')
    ->paginate(10);

    $totalOrders =  DB::table('orders')
    ->join('order_product' , 'orders.id' , '=' , 'order_product.order_id')
    ->join('products' , 'order_product.product_id' , '=' , 'products.id')
    ->join('users' , 'products.user_id' , '=' , 'users.id')
    ->where('users.id' , '=' , $id)
    ->select('orders.*')
    ->distinct()
    ->get();


    /* dd($products); */

    return view("admin.index", compact("totalProducts","totalOrders","dataProducts","orders"));
}
}
