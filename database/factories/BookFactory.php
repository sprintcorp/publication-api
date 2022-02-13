<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'id' => $faker->numberBetween(1,10),
        'title'=> $faker->name
    ];
});
