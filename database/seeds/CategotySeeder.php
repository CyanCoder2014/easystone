<?php

use Illuminate\Database\Seeder;

class CategotySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::insert([
            [
              'name' => 'خرید',
              'type_id' => 0
            ],
            [
              'name' => 'سفارش',
              'type_id' => 1
            ],
        ]);
    }
}
