<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $fillable = ["subtotal","date_order","date_delivery","customer_name","customer_surname","customer_email","customer_telephone","delivery_address"];
    protected $guarded = ['id'];
    public function products(){
        return $this->belongsToMany("App\Product");
    }
}
