<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'title' => $faker->image($width = 640, $height = 480),
        'post_id' => $faker->numberBetween($min = 1, $max = 50),
    ];
});
