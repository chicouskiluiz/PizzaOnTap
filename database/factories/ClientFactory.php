<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'cpf' => $faker->numberBetween(99999999999),
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'password' => 'secret'
    ];
});
