<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Offer;
use Faker\Generator as Faker;

$factory->define(Offer::class, function (Faker $faker) {
    return [
        'product_id' => factory("App\Models\Product")->create()->id,
        'price' => $faker->randomDigit(),
        'amount' => $faker->randomDigit(),
        'sales' => $faker->randomDigit(),
        'article' => $faker->sentence(4),
    ];
});
