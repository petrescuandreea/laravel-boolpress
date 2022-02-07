<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        
        'authorName'=> $faker -> name(),
        'postDate'=> $faker -> date(),
        'title'=> $faker -> words(4, true),
        'subTitle'=> $faker -> optional() -> words(6, true),
        'postText'=> $faker -> text(),
    ];
});
