<?php

use App\Venta;
use App\Cliente;
use App\Producto;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Cliente::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->lastname,

    ];
});

$factory->define(App\Producto::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph(),
        'price' => $faker->numberBetween(100, 500),
        'quantity' => $faker->numberBetween(1,10),
    ];
});

$factory->define(App\Venta::class, function (Faker $faker) {
    return [
        'cliente_id' => Cliente::all()->random()->id,
    ];
});



