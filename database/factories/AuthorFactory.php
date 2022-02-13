<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    return [
        'id' => $faker->numberBetween(1,10),
        'name'=> $faker->name
    ];
});
