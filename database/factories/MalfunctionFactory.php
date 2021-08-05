<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Malfunction;
use Faker\Generator as Faker;

$factory->define(Malfunction::class, function (Faker $faker) {
    return [
        'name'=> $faker->word(),
        'description'=> $faker->paragraph(1)
    ];
});
