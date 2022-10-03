<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {


    if($id){
        $restaurants = DB::table('restaurants')
        ->join('category_restaurant' , 'category_restaurant.restaurant_id' , '=' , 'restaurants.id')
        ->join('categories' , 'category_restaurant.category_id' , '=' , 'categories.id')
        ->where('categories.id' , '=' ,$id)
        ->select('restaurants.*')
        ->get();
    }else{
        $restaurants = Restaurant::all();
    }
        
        $categories = Category::all();
        
        return response()->json(["restaurants"=>$restaurants,"categories"=>$categories]);


        /* SELECT * FROM `restaurants` JOIN `category_restaurant` 
        ON `category_restaurant`.`restaurant_id`= `restaurants`.`id` 
        JOIN `categories` ON `category_restaurant`.`category_id` = `categories`.`id`
        WHERE `categories`.`id`= 19 */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
