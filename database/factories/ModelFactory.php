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

$factory->define(User::class, function (Faker $faker) 
{   
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Data::class, function (Faker $faker) 
{   
    return [
        'first_name' => $faker->randomElement($array = array ('AUDI', 'VW', 'BMW', 'MAZDA', 'RENAULT')),
        'last_name' => $faker->randomElement($array = array ('Quattro', 'Miata', 'X-Type', 'Fiesta', 'X7', 'Clio')),
        // 'email' => $faker->safeEmail,
        'gender' =>  $faker->randomElement($array = array ('Coupe', 'Limousine', 'SUV')),
        'country' => $faker->randomElement($array = array ('Germany', 'Japan', 'USA', 'France')),
        'salary' => $faker->randomFloat(15000, 21000, 38000, 26000, 9000),
    ];
});
