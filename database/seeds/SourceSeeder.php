<?php

use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Source::insert([
            [
                'name' => 'معدن1',
            ],
            [
                'name' => 'معدن2',
            ],
            [
                'name' => 'معدن3',
            ],
        ]);
    }
}
