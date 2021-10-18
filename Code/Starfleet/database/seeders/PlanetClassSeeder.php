<?php

namespace Database\Seeders;

use App\Models\PlanetClass;
use Illuminate\Database\Seeder;

class PlanetClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlanetClass::create(['name' => 'D', 'description' => 'An uninhabitable planetoid, moon, or small planet with little to no atmosphere. Some were viable candidates for terraforming.']);
        PlanetClass::create(['name' => 'J', 'description' => 'A type of gas giant.']);
        PlanetClass::create(['name' => 'K', 'description' => 'Adaptable for Humans by use of artificial biospheres.']);
        PlanetClass::create(['name' => 'M', 'description' => 'Earth-like, with atmospheres containing oxygen and, typically, nucleogenic particles. Largely habitable for humanoid life forms.']);
        PlanetClass::create(['name' => 'Y', 'description' => 'A world with a toxic atmosphere and surface temperatures exceeding 500 Kelvin. Prone to thermionic radiation discharges.']);
    }
}
