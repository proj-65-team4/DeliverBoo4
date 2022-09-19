<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use App\ProductCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy("name", "asc")->get();

        $products->load('product_courses');

        return view("admin.products.index", compact("products"));

        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $courses= ProductCourse::all();
      return view("admin.products.create", compact("courses"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newProduct = new Product();
        
        $newProduct->fill($data);
        $newProduct->user_id = Auth::user()->id;
        $newProduct->save();

        return redirect()->route("admin.products.show" , $newProduct->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $product = Product::findOrFail($id);

      return view("admin.products.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $product = Product::FindOrFail($id);
      $productCourses = ProductCourse::all();
      $productCategories = ProductCategory::all();

      return view('admin.products.edit', compact("product", "productCourses", "productCategories"));
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
      $product = Product::findOrFail($id);

      $validateData = $request->validate([
        'name' => 'required|min:3|max:50',
        'description' => 'required',
        'price' => 'required',
        'visible',
        'available',
      ]);

      if(isset($_POST["visible"])){
        $product["visible"] = 1;
      }else{
          $product->visible = 0;
      }

      if(isset($_POST["available"])){
        $product["available"] = 1;
      }else{
          $product->available = 0;
      }
      
      $product->update($validateData);

      return redirect()->route('admin.products.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route("admin.products.index");
    }
}
