<?php

use Faker\Generator as Faker;       // bring in
use App\User;                       // bring in
use App\Data;                       // bring in

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker $faker) 
{   
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Data::class, function (Faker $faker) 
{   
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        // 'email' => $faker->safeEmail,
        'gender' =>  $faker->randomElement($array = array ('Male', 'Female')),
        'country' => $faker->country,
        'salary' => $faker->randomFloat(3, 2000, 12000)
    ];
});
