<?php

use App\Purpose;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*$this->call(PurposesTableSeeder::class);
        $this->call(ExpensesTableSeeder::class);*/

//        factory(Purpose::class, 100)->create();
        factory(\App\Vehicle::class, 50)->create();
         factory(\App\Client::class, 50)->create();
       factory(\App\Driver::class,50)->create();
    }
}
