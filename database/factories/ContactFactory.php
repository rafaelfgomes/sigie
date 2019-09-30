<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {

    static $id = 1;

    return [
        'phone' => $faker->numberBetween(11111111, 99999999),
        'mobile' => $faker->numberBetween(111111111, 999999999),
        'student_id' => $id++
    ];
});
