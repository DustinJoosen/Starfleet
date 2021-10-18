<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Starship extends Model
{
    use HasFactory;

    protected $fillable = [
        "crew_id",
        "starshiptype_id",
        "name",
        "prefix",
        "registry",
        "is_active",
        "build_at",
        "destroyed_at",
        "status"
    ];

    public function crew(){
        return $this->belongsTo(Crew::class);
    }

    public function starship_type(){
        return $this->belongsTo(StarshipType::class, "starshiptype_id");
    }
}
