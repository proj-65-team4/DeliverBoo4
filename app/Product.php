<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price','product_course_id', 'visible', 'available'];

    public function orders () 
    {
        return $this->belongsToMany("App\Order");
    }

    public function product_categories () 
    {
        return $this->belongsToMany("App\ProductCategory");
    }

    public function product_courses () 
    {
        return $this->belongsTo("App\ProductCourse");
    }


}
