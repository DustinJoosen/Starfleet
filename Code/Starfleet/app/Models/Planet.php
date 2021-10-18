<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;

    protected $table = "planets";
    protected $fillable = [
        "planetclass_id",
        "name",
        "sector",
        "quadrant",
        "has_life",
    ];

    public function planet_class(){
        return $this->belongsTo(PlanetClass::class, "planetclass_id");
    }

    public function officers(){
        return $this->hasMany(Officer::class, 'homeworld_id');
    }

    public function species(){
        return $this->belongsToMany(Species::class);
    }
}
