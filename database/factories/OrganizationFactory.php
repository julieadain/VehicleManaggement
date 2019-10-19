<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Organization;
use Faker\Generator as Faker;

$factory->define(Organization::class, function (Faker $faker) {
    return [
        'org_name'=> $faker->name,
        'address'=> $faker->address,
        'trade_license_copy'=> \Illuminate\Support\Str::random(5),
        'status'=>$faker->numberBetween(-1,1)
    ];
});
