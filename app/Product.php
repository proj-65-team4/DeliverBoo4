<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function orders () {
        return $this->belongsToMany("App\Order");
    }

    public function product_categories () {
        return $this->belongsToMany("App\ProductCategory");
    }

    public function product_courses () {
        return $this->belongsToMany("App\ProductCourse");
    }
}
