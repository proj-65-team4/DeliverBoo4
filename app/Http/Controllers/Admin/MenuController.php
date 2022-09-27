<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Product;
use App\ProductCategory;
use App\ProductCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Foreach_;
use Symfony\Component\Console\Input\Input;

class MenuController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $user = Auth::user();
    
    $query = $request->query();
    $queryValue = null;

    if(key_exists("product_course", $query)){
      $products = Product::orderBy("name", "asc")->where('user_id', $user->id)->where('product_course_id', $query['product_course'])->get();
      $queryValue = $query['product_course'];

    } else {
      $products = Product::orderBy("name", "asc")->where('user_id', $user->id)->get();
    }

    $courses = ProductCourse::all();

    

    /* dd($queryValue); */
    return view("admin.products.index", compact("products", "courses", "queryValue"));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $courses = ProductCourse::all();
    $categories = ProductCategory::all();
    return view("admin.products.create", compact("courses", "categories"));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreProductRequest $request)
  {
    $data = $request->all();
    $user = Auth::user();

    $courses = ProductCourse::findOrFail($request->product_course_id);

    $user->product = new Product();

    $validateData = $request->validated();

    if (isset($_POST["visible"])) {
      $user->product["visible"] = 1;
    } else {
      $user->product->visible = 0;
    }

    if (isset($_POST["available"])) {
      $user->product["available"] = 1;
    } else {
      $user->product->available = 0;
    }
    $product['image'] = $request->image;
    $user->product->fill($validateData);
    $user->product->user_id = $user->id;
    /* $user->product->save(); */
    $courses->products()->save($user->product);


    if (key_exists("categories", $data)) {
      $user->product->product_categories()->attach($data["categories"]);
    }




    return redirect()->route("admin.products.show", $user->product->id)->with("message", "Prodotto aggiunto con successo");
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
    if($product->user_id === Auth::user()->id){

      return view("admin.products.show", compact("product"));
    }
    else{
      return abort(404);
    }
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
  public function update(StoreProductRequest $request, $id)
  {
    $data= $request->all();
    $product = Product::findOrFail($id);

    $validateData = $request->validated();

    if (isset($_POST["visible"])) {
      $product["visible"] = 1;
    } else {
      $product->visible = 0;
    }

    if (isset($_POST["available"])) {
      $product["available"] = 1;
    } else {
      $product->available = 0;
    }

    if ($product->product_course_id !== $request->product_course_id) {
      $product->product_course_id = $request->product_course_id;
    }

    if ($product['image'] !== $request->image) {
      $product['image'] = $request->image;
    }

    if (key_exists("categories", $data)) {
      $product->product_categories()->sync($data["categories"]);
    } else {
      $product->product_categories()->sync([]);
    }

    $product->update($validateData);

    return redirect()->route('admin.products.show', $product->id)->with("message", "Prodotto modificato con successo");
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

    return redirect()->route("admin.products.index")->with("message", "Prodotto eliminato con successo");
  }
}
