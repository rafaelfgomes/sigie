<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {

    static $id = 1;

    return [
        'street' => $faker->streetName,
        'number' => $faker->randomNumber(),
        'neighbour' => $faker->name,
        'zipcode' => $faker->numberBetween(11111111, 99999999),
        'city' => $faker->city,
        'state' => 'SP',
        'student_id' => $id++
    ];
});
