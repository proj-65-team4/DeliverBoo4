<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
public function index()
{
    $user = Auth::user();
    $totalProducts = Product::where('user_id', $user->id)->count();

    $dataProducts = Product::orderBy("name", "asc")->where('user_id', $user->id)->paginate(10);

    /* dd($products); */

    return view("admin.index", compact("totalProducts", "dataProducts"));
}
}
