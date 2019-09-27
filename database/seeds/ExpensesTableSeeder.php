<?php

use Illuminate\Database\Seeder;

class ExpensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Expense::create([
            'amount' => rand(200, 1000),
            'purpose_id' => rand(1, 10)
        ]);
    }
}
