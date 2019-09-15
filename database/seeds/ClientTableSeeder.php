<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Client::create([
            'name'=>'jyoti',
            'phone'=>'0176',
            'email'=>'chaity@gmail.com',
            'address'=>'netrokona',
            'org_id'=>'1'
            ]);

    }
}
