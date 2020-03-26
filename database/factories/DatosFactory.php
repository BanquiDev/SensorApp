<?php

use Faker\Generator as Faker;

$factory->define(App\Datos::class, function (Faker $faker) {
    return [

        'humedad' => $faker->randomFloat(3, 50, 100),
        'temperatura' => $faker->randomFloat(3, 5, 35),
        
    ];
});
