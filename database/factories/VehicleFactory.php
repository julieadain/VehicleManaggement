<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Vehicle::class, function (Faker $faker) {
    return [
        'brand' => $faker->company,
        'model' => $faker->numberBetween(2000, 2020),
        'color' => $faker->colorName,
        'reg_number' => $faker->randomNumber(),
        'reg_date' => $faker->date(),
        'seat_capacity'=> $faker->numberBetween(1,5),
        'ac'=>$faker->numberBetween(1,2),
        'ownership_status'=>$faker->numberBetween(1,2),
        'reg_scan_copy' => $faker->text,
        'insurance_scan_copy' => \Illuminate\Support\Str::random(50),
        'roadPermit_scan_copy' => \Illuminate\Support\Str::random(50),
        'photo' => \Illuminate\Support\Str::random(50),
        'status'=> $faker->numberBetween(0,1),
        'user_id'=> 1,

    ];
});
