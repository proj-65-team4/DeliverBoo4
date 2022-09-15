<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    public function products()
    {
        return $this->belongsToMany("App\Product");
    }
}
