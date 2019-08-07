<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PurposesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <10; $i++) {
            \App\Purpose::create([
                'title' => Str::random(10)
            ]);
        }
    }
}
