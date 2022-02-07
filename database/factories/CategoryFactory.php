<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        
        'name' => $faker -> word(1, true),
        'description' => $faker -> text(),
    ];
});
