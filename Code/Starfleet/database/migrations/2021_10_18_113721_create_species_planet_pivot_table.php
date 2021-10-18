<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeciesPlanetPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planet_species', function (Blueprint $table) {
            $table->id();
            $table->foreignId("species_id");
            $table->foreignId("planet_id");
            $table->timestamps();

            $table->foreign("species_id")->references("id")->on("species");
            $table->foreign("planet_id")->references("id")->on("planets");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planet_species');
    }
}
