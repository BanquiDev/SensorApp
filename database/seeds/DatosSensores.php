<?php

use Illuminate\Database\Seeder;

class DatosSensores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(\App\Sensores::class, 20)->create();
        factory(\App\Datos::class, 30)->create();
    }
}
