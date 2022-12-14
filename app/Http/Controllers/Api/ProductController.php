<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
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
    public function index($slug)
    {
        $restaurant = Restaurant::where("slug", $slug)->get();
        
        foreach ($restaurant as $rest) {
            $id = $rest["user_id"];
        }
        
        $products = Product::where("user_id", $id)->where("visible", 1)->get();

        $products->load("product_course:id,name", "product_categories:id,name,icon");

        // $products->load("product_categories:id,name,icon");
        
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

        // $productCategory = ProductCategory::all();
        // $p = [];

        // foreach ($products as $product) {
        //     foreach ($productCategory as $cat) {
        //         if($cat->id == $product->product_category_id){
        //             $p[] = $cat; 
        //         }
        //     }
        // }
        // $p = array_unique($p);


        $categories = DB::table('categories')
        ->join('category_restaurant' , 'category_restaurant.category_id' , '=' , 'categories.id')
        ->join('restaurants' , 'category_restaurant.restaurant_id' , '=' , 'restaurants.id')
        ->where('restaurants.slug' , '=' ,$slug)
        ->select('categories.id', 'categories.name')
        ->get();

        $productCategory = DB::table('products')
        ->join('product_product_category' , 'product_product_category.product_id' , '=' , 'products.id')
        ->join('product_categories' , 'product_product_category.product_category_id' , '=' , 'product_categories.id')
        ->where('products.id' , '=' , 70)
        ->select('product_categories.name', 'product_categories.icon')
        ->get();

        return response()->json(["products"=>$products, "courses"=>$c, "restaurant"=>$restaurant, "categories"=>$categories, "productCategory"=>$productCategory]);
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
