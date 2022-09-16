<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productsData = config("DataProducts");

        foreach($productsData as $product){
            $data = new Product();
            
            $data->name = $product["name"];
            $data->description = $product["description"];
            $data->price = $product["price"];
            $data->visible = $product["visible"];
            $data->available = $product["available"];
            $data->image = $product['image'];

            $data->save();
        }
    }
}
