<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'details', 'price', 'discount', 'stock'];

    function reviews(){
        return $this->hasMany(Review::class);
    }

//    function getRouteKeyName()
//    {
//        return 'name';
//    }
}
