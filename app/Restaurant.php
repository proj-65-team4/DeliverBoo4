<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable= ["restaurant_name","address","city", "VAT","slug"];

    public function categories(){
        return $this->belongsToMany("App\Category");
    }
    public function user(){
        return $this->belongsTo("App\User");
    }
}
