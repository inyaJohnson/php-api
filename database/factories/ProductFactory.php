<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //
        'name'=> $faker->word,
        'details'=> $faker->paragraph,
        'price' => $faker->randomFloat(2,100,1000),
        'discount' => $faker->randomFloat(2,0,30),
        'stock' => $faker->randomDigit,
        'user_id' => function(){
            return \App\User::all()->random();
        }
    ];
});
