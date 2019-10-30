<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

    return [
        'title' => $faker->title,
        'body' => $faker->paragraph,
        'category_id' => 1,
        'type_id' => 1,
        'user_id' => 1,
    ];
});
