<?php

use App\Client;
use App\Driver;
use App\Organization;
use App\Package;
use App\Purpose;
use App\User;
use App\Vehicle;
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
        factory(Package::class, 10)->create();
        factory(Organization::class, 5)->create();
        factory(User::class, 10)->create();
        factory(Vehicle::class, 50)->create();
        factory(Client::class, 50)->create();
       factory(Driver::class,50)->create();
    }
}
