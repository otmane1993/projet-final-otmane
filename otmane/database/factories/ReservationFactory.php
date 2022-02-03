<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'sejour_id'=>$faker->numberBetween(1,25),
        'user_id'=>$faker->numberBetween(1,25),
    ];
});
