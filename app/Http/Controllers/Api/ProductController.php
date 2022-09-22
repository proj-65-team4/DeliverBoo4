<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        return response()->json($categories);
        // $queryString = $request->query();

        // $query = Product::select("id", "name", "description", "price", "visible", "available", "image");

        // if (key_exists("user_id", $queryString)) {
        //     $query->where("user_id", $queryString["user_id"]);
        // }

        // if (key_exists("order_by", $queryString)) {
        //     if (key_exists("order_direction", $queryString)) {
        //         $query->orderBy($queryString["order_by"], $queryString["order_direction"]);
        //     } else {
        //         $query->orderBy($queryString["order_by"]);
        //     }
        // } else {
        //     $query->orderBy("created_at", "desc");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

}
