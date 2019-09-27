<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'cpf' => $faker->numberBetween(10000000000),
        'birth_date' =>$faker->date(),
        'email' => $faker->unique()->safeEmail,
        'status' => $faker->numberBetween(0, 1),
    ];
});
