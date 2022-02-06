<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hotel;
use Faker\Generator as Faker;

$factory->define(Hotel::class, function (Faker $faker) {
    return [
        'price'=>$faker->numberBetween(10, 500),
        'name_hotel'=>$faker->name,
        'image_hotel'=>$faker->name,
    ];
});
