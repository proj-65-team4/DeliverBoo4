<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/restaurants/{id}", "Api\RestaurantController@index");

Route::get("/categories", "Api\CategoryController@category");

Route::get("/products/{id}", "Api\ProductController@show");

Route::get("/{restaurant_id}/products", "Api\ProductController@index");

Route::post("/order", "Api\OrdersController@order");



