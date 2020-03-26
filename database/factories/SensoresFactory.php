<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sensores;
use Faker\Generator as Faker;

$factory->define(App\Sensores::class, function (Faker $faker) {
    return [
        'temperatura' => $faker->randomDigit(2, 2, 4),
        'humedad' => $faker->randomDigit(2, 2, 4),
        'hospitales_id' =>$faker->randomDigit(1, 4),
        'proovedores_id' => $faker->randomDigit(1, 5),
        
    ];
});
