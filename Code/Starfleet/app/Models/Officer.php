<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

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

    protected static function boot(){
        parent::boot();

        static::created(function($officer){
            $email = str_replace(' ', '', $officer->name) . '@' . $officer->department->name . '.starfleet.com';

            $user = $officer->user()->create([
                'name' => $officer->name,
                'email' => strtolower($email),
                'password' => Hash::make('Welcome123')
            ]);

            $officer->user_id = $user->id;
            $officer->push();

        });
    }


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
