<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price','product_course_id', 'visible', 'available' , 'image'];
    protected $guarded = ['id'];
    public function orders () 
    {
        return $this->belongsToMany("App\Order");
    }

    public function product_categories () 
    {
        return $this->belongsToMany("App\ProductCategory");
    }

    public function product_course () 
    {
        return $this->belongsTo("App\ProductCourse");
    }


}
