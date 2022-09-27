<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCourse;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $products = Product::where("user_id", $id)->get();
        $products->load("product_course:id,name");

        $courses = ProductCourse::all();
        $c = [];

        foreach ($products as $product) {
            foreach ($courses as $course) {
                if($course->id == $product->product_course_id){
                    $c[] = $course; 
                }
            }
        }
        $c = array_unique($c);

        $restaurant = Restaurant::where("user_id", $id)->get();

        $categories = DB::table('categories')
        ->join('category_restaurant' , 'category_restaurant.category_id' , '=' , 'categories.id')
        ->join('restaurants' , 'category_restaurant.restaurant_id' , '=' , 'restaurants.id')
        ->where('restaurants.id' , '=' ,$id)
        ->select('categories.name')
        ->get();

        return response()->json(["products"=>$products, "courses"=>$c, "restaurant"=>$restaurant, "categories"=>$categories]);
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
