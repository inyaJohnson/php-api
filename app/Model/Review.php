<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    function products(){
        return $this->belongsTo(Product::class);
    }
}
