<?php

use Illuminate\Database\Seeder;

class TypeSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\TypeSize::insert([
            [
                'name' => 'حکمی',
                'length' => 1,
                'height' => 1,
                'width' => 0,
                'tonnage' => 0,
                'quantity' => 0,
                'price_calculation' => 'square',
            ],
            [
                'name' => 'کوپ',
                'length' => 1,
                'height' => 1,
                'width' => 1,
                'tonnage' => 1,
                'quantity' => 0,
                'price_calculation' => 'tonnage',
            ],
            [
                'name' => 'طولی',
                'length' => 1,
                'height' => 1,
                'width' => 0,
                'tonnage' => 0,
                'quantity' => 0,
                'price_calculation' => 'length',
            ]
        ]);
    }
}
