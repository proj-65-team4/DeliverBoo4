<?php

use App\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = config('DataProductCategories');

       foreach ($data as $category) {
            $newProductCategory = new ProductCategory();
            $newProductCategory->name = $category;
            $newProductCategory->save();

    }
    }
}
