<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory;

    protected $table = "crews";
    protected $fillable = [
        "captain_id",
        "firstofficer_id",
        "secondofficer_id",
        "chiefmedical_id",
        "chiefsecurity_id",
        "chiefengineering_id"
    ];

    public function starship(){
        return $this->hasOne(Starship::class);
    }

    public function captain(){
        return $this->belongsTo(Officer::class, 'captain_id');
    }

    public function first_officer(){
        return $this->belongsTo(Officer::class, 'firstofficer_id');
    }

    public function second_officer(){
        return $this->belongsTo(Officer::class, 'secondofficer_id');
    }

    public function chief_medical(){
        return $this->belongsTo(Officer::class, 'chiefmedical_id');
    }

    public function chief_security(){
        return $this->belongsTo(Officer::class, 'chiefsecurity_id');
    }

    public function chief_engineering(){
        return $this->belongsTo(Officer::class, 'chiefengineering_id');
    }



}
