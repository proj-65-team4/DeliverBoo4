<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Restaurant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class RestaurantController extends Controller
{


    private function generateSlug($text, $name)
    {
        $toReturn = null;
        $counter = 0;
        $text .= " da " . $name;
        do {
            // generiamo uno slug partendo dal titolo
            $slug = Str::slug($text);

            // se il counter é maggiore di 0, concateno il suo valore allo slug
            if ($counter > 0) {
                $slug .= "-" . $counter;
            }

            // controllo a db se esiste già uno slug uguale
            $slug_esiste = Restaurant::where("slug", $slug)->first();

            if ($slug_esiste) {
                // se esiste, incremento il contatore per il ciclo successivo
                $counter++;
            } else {
                // Altrimenti salvo lo slug nei dati del nuovo post
                $toReturn = $slug;
            }
        } while ($slug_esiste);

        return $toReturn;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=Auth::user();
        $categories = Category::all();
        return view("admin.restaurant.create", compact("user","categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {   
        $user = Auth::user();

        $data = $request->all();
        
        
        $validatedData = $request->validated();
        $pathImg=null;
        if ($request->image) {
            $file = $request->image;
            $pathImg = Storage::put("/", $file);
        }
        
        
        $user->restaurant = new Restaurant();
        $user->restaurant->user_id=$user->id;
        if($pathImg){
            $user->restaurant->image = $pathImg;
        }

        
        $user->restaurant->fill($data);
        $user->restaurant->slug = $this->generateSlug($user->restaurant["restaurant_name"], $user->name);
        $user->restaurant->save();
        dd($user->restaurant->image);
        if (key_exists("categories", $data)) {
            $user->restaurant->categories()->attach($data["categories"]);
        }

        return redirect()->route("admin.dashboard");
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
