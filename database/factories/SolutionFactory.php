<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Solution;
use Faker\Generator as Faker;

$factory->define(Solution::class, function (Faker $faker) {
    return [
        'name'=> $faker->word(),
        'description'=> $faker->paragraph(1)
    ];
});
