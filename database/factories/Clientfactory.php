<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\client;
use Faker\Generator as Faker;

$factory->define(\App\Client::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'phone'=> $faker->phoneNumber,
        'email'=> $faker->unique()->safeEmail,
        'address'=> $faker->address,
        'org_id'=>$faker->numberBetween(1,5),
    ];
});
