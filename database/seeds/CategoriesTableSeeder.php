<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataCategories = config('DataCategories');

        foreach ($dataCategories as $category) {
            
            $newCategory = new Category();

            $newCategory->name = $category['name'];
            $newCategory->image = $category['image'];

            $newCategory->save();

        }
    }
}
