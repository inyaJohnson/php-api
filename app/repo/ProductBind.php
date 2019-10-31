<?php
/**
 * Created by PhpStorm.
 * User: tujailer
 * Date: 10/18/19
 * Time: 7:30 PM
 */

namespace App\Repo;

use App\Model\Product;
use App\Model\Review;


class ProductBind extends Product
{
    function reviews(){
        return $this->hasMany(Review::class);
    }

}