<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "is_humanoid",
        "is_federation",
        "abilities",
        "notes"
    ];

    public function officers(){
        return $this->hasMany(Officer::class);
    }

    public function planets(){
        return $this->belongsToMany(Planet::class);
    }
}
