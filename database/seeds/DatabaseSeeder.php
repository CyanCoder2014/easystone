<?php

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
         $this->call(UserSeeder::class);
         $this->call(CategotySeeder::class);
         $this->call(ColorSeeder::class);
         $this->call(ProcessingSeeder::class);
         $this->call(QualitySeeder::class);
         $this->call(SourceSeeder::class);
         $this->call(SurfaceSeeder::class);
         $this->call(TypeSizeSeeder::class);
    }
}
