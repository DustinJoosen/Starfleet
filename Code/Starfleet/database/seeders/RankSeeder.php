<?php

namespace Database\Seeders;

use App\Models\Rank;
use Illuminate\Database\Seeder;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rank::create(['name' => 'Ensign', 'order' => 1]);
        Rank::create(['name' => 'Leautiant junior grade', 'order' => 2]);
        Rank::create(['name' => 'Leautiant', 'order' => 3]);
        Rank::create(['name' => 'Leautiant commander', 'order' => 4]);
        Rank::create(['name' => 'Commander', 'order' => 5]);
        Rank::create(['name' => 'Captain', 'order' => 6]);
        Rank::create(['name' => 'Admiral', 'order' => 7]);
    }
}
