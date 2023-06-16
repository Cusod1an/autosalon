<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AutoSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(SalonSeeder::class);
    }
}
