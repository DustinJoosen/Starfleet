<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;

    protected $table = "officers";
    protected $fillable = [
        "name",
        "user_id",
        "species_id",
        "homeworld_id",
        "rank_id",
        "department_id",
        "born_at",
        "deceased_at",
        "assignment"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function species(){
        return $this->belongsTo(Species::class);
    }

    public function homeworld(){
        return $this->belongsTo(Planet::class, 'homeworld_id');
    }

    public function rank(){
        return $this->belongsTo(Rank::class);
    }

    public function role(){
        $rank = $this->rank;
        return strtolower($rank->name);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

}
