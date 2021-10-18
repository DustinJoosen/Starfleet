<?php

namespace Database\Seeders;

use App\Models\StarshipType;
use Illuminate\Database\Seeder;

class StarshipTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StarshipType::create(['name' => 'Crossfield']);
        StarshipType::create(['name' => 'Galaxy']);
        StarshipType::create(['name' => 'Constitution']);
        StarshipType::create(['name' => 'California']);
        StarshipType::create(['name' => 'Excelsior']);
    }
}
