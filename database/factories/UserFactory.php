<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'phone' => $faker->phoneNumber,
    ];
});

$factory->define(App\Item::class, function (Faker $faker) {
    $size = ['sm', 'm', 'l', 'xl', '5', '6', '7', '8.5'];
    $condition = ['used', 'new'];
    return [
        'name' => str_random(8),
        'user_id' => App\User::all()->random()->id,
        'size' => $size[$faker->numberBetween(0,7)],
        'condition' => $condition[$faker->numberBetween(0,1)],
        'range' => '99,130',
        'dropped_off' => $faker->date()
    ];
});
