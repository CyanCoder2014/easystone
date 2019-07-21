<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Color::insert([
            [
                'name' => 'آبی',
            ],
            [
                'name' => 'فیروزه ای',
            ],
            [
                'name' => 'سرمه ای',
            ],
            [
                'name' => 'آبی نفتی',
            ],
        ]);
    }
}
