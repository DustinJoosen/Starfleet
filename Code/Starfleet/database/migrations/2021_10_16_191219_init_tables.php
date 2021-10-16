<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranks', function(BluePrint $table){
           $table->id();
           $table->string("name")->unique();
           $table->integer("order")->unsigned();
           $table->timestamps();
        });

        Schema::create('departments', function (Blueprint $table){
            $table->id();
            $table->string("name")->unique();
            $table->text("description")->nullable();
            $table->timestamps();
        });

        Schema::create('planetclasses', function(Blueprint $table){
            $table->id();
            $table->string("name")->unique();
            $table->text("description")->nullable();
            $table->timestamps();
        });

        Schema::create('species', function(Blueprint $table){
            $table->id();
            $table->string("name")->unique();
            $table->boolean("is_humanoid")->nullable()->default(false);
            $table->boolean("is_federation")->nullable()->default(false);
            $table->text("abilities")->nullable();
            $table->text("notes");
            $table->timestamps();
        });

        Schema::create('starshiptypes', function(Blueprint $table){
            $table->id();
            $table->string("name")->unique();
            $table->string("image_name")->nullable()->default("notfound.png");
            $table->timestamps();
        });

        Schema::create('planets', function(Blueprint $table) {
            $table->id();
            $table->foreignId("planetclass_id");
            $table->string("name")->unique();
            $table->string("sector")->nullable();
            $table->string("quadrant")->nullable();
            $table->boolean("has_life")->nullable()->default(false);
            $table->timestamps();

            $table->foreign("planetclass_id")->references("id")->on("planetclasses");
        });

        Schema::create('officers', function(Blueprint $table){
            $table->id();
            $table->string("name");
            $table->foreignId("user_id");
            $table->foreignId("species_id");
            $table->foreignId("homeworld_id")->nullable();
            $table->foreignId("rank_id");
            $table->foreignId("department_id");
            $table->dateTime("born_at");
            $table->dateTime("deceased_at");
            $table->string("assignment");
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("species_id")->references("id")->on("species");
            $table->foreign("homeworld_id")->references("id")->on("planets");
            $table->foreign("rank_id")->references("id")->on("ranks");
            $table->foreign("department_id")->references("id")->on("departments");
        });

        Schema::create('crews', function (Blueprint $table){
            $table->id();
            $table->foreignId("captain_id")->unique();
            $table->foreignId("firstofficer_id")->nullable()->unique();
            $table->foreignId("secondofficer_id")->nullable()->unique();
            $table->foreignId("chiefmedical_id")->nullable()->unique();
            $table->foreignId("chiefsecurity_id")->nullable()->unique();
            $table->foreignId("chiefengineering_id")->nullable()->unique();
            $table->timestamps();

            $table->foreign("captain_id")->references("id")->on("users");
            $table->foreign("firstofficer_id")->references("id")->on("users");
            $table->foreign("secondofficer_id")->references("id")->on("users");
            $table->foreign("chiefmedical_id")->references("id")->on("users");
            $table->foreign("chiefsecurity_id")->references("id")->on("users");
            $table->foreign("chiefengineering_id")->references("id")->on("users");
        });


        Schema::create('starships', function(Blueprint $table){
            $table->id();
            $table->foreignId("crew_id");
            $table->foreignId("starshiptype_id");
            $table->string("name");
            $table->string("prefix")->nullable()->default("NCC");
            $table->boolean("is_active")->nullable()->default(true);
            $table->datetime("build_at");
            $table->datetime("destroyed_at")->nullable();
            $table->string("status");
            $table->timestamps();

            $table->foreign("crew_id")->references("id")->on("crews");
            $table->foreign("starshiptype_id")->references("id")->on("starshiptypes");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("starships");
        Schema::dropIfExists("crews");
        Schema::dropIfExists("officers");
        Schema::dropIfExists("planets");
        Schema::dropIfExists("starshiptypes");
        Schema::dropIfExists("species");
        Schema::dropIfExists("planetclasses");
        Schema::dropIfExists("departments");
        Schema::dropIfExists("ranks");
    }
}
