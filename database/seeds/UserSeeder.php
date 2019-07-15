<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Str;
use \Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'type' => 'admin',
            'email' => 'easystone@cyancoder.com',
            'password' => bcrypt('521478963'),
            'mobile' => '09128514651',
        ]);
    }
}
