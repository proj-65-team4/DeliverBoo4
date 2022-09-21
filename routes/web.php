<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin', 'Admin\HomeController@index')->name('admin');

Route::middleware("auth")
->namespace("Admin")
->name("admin.")
->prefix("admin")
->group(function () {
Route::get("/dashboard", "DashboardController@index")->name("dashboard");

    Route::resource("products", "MenuController");
 /*    Route::resource("restaurant", "RestaurantController"); */
    Route::get("/restaurant/create/{id}", "RestaurantController@create")->name("restaurant.create");
    Route::post("/restaurant/{id}", "RestaurantController@store")->name("restaurant.store");

    Route::get("/orders", "OrderController@index")->name("orders.index");
    Route::get("/orders/{order}", "OrderController@show")->name("orders.show");

    Route::get("/orders/statistic", "OrderController@statistic")->name("orders.statistic");
});


