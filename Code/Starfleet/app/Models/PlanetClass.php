<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanetClass extends Model
{
    use HasFactory;

    protected $table = "planetclasses";
    protected $fillable = [
        "name",
        "description"
    ];

    public function planets(){
        return $this->hasMany(Planet::class, "planetclass_id");
    }
}
