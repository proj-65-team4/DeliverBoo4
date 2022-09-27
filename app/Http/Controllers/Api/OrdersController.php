<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function order(Request $request)
    {
        $data= $request->all();
        return /* response()->json($data) */;
    }
}
