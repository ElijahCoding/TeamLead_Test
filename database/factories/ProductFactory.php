<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'image' => $faker->sentence(4),
        'description' => $faker->sentence(10),
        'first_invoice' => Carbon::now(),
        'url' => $faker->sentence(4),
        'price' => $faker->randomDigit(),
        'amount' => $faker->randomDigit(),
    ];
});
