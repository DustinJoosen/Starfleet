<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create(['name' => 'Command', 'description' => 'The command department is the corps of officers within Starfleet who specialize in command and control functions on starbases, aboard starships, and at Starfleet Command.']);
        Department::create(['name' => 'Operations', 'description' => 'The operations department is the corps of officers and crewmen within Starfleet who specialize in services and military functions on starbases, aboard starships, and at Starfleet Command.']);
        Department::create(['name' => 'Sciences', 'description' => 'The sciences department is the corps of officers within Starfleet who specialize in both scientific and medical research and control functions on starbases, aboard starships, and at Starfleet Command']);
    }
}
