<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'parent_id' => factory('App\Models\Category')->create()->id,
        'title' => $title = $faker->sentence(4),
        'alias' => str_slug($title)
    ];
});
