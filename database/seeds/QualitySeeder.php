<?php

use Illuminate\Database\Seeder;

class QualitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Quality::insert([
            [
                'name' => 'چرمی',
            ],
            [
                'name' => 'تیشه ای',
            ],
            [
                'name' => 'اپوکسی',
            ],
            [
                'name' => 'ساب خورده',
            ],
            [
                'name' => 'بدون ساب',
            ],
            [
                'name' => 'رزین',
            ],
        ]);
    }
}
