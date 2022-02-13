<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Publisher;
use Faker\Generator as Faker;

$factory->define(Publisher::class, function (Faker $faker) {
    return [
        'id' => $faker->numberBetween(1,10),
        'name'=> $faker->name
    ];
});
