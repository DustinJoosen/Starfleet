<?php

namespace Database\Seeders;

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
        $this->call(DepartmentSeeder::class);
        $this->call(RankSeeder::class);
        $this->call(StarshipTypeSeeder::class);
        $this->call(PlanetClassSeeder::class);
    }
}
