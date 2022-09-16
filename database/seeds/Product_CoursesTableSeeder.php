<?php

use App\ProductCourse;
use Illuminate\Database\Seeder;

class Product_CoursesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    $dataCourses = config('DataCourses');

    foreach ($dataCourses as $data) {
      
      $courses = new ProductCourse();

      $courses->name = $data;

      $courses->save();
    }
  }
}
