<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function orders () {
        return $this->belongsToMany("App\Product");
    }

    public function product_category()
    {
        return $this->belongsToMany("App\Product_category");
    }
}
