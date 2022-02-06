<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sejour;
use Faker\Generator as Faker;

$factory->define(Sejour::class, function (Faker $faker) {
    return [
        'date_depart'=>$faker->date,
        'date_arrive'=>$faker->date,
        'hotel_id'=>$faker->numberBetween(1,25),
        'ville_id'=>$faker->numberBetween(1,25),
    ];
});
