<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Driver;
use Faker\Generator as Faker;

$factory->define(Driver::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'email'=> $faker->unique()->safeEmail,
        'phone'=> $faker->phoneNumber,
        'address'=> $faker->address,
        'dl_scan'=> \Illuminate\Support\Str::random(50),
        'nid_scan'=> \Illuminate\Support\Str::random(50),
        'photo'=> \Illuminate\Support\Str::random(50),
        'user_id'=> 1,
        'org_id'=>1,
    ];
});
