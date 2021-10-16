<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;

    protected $table = "planets";
    protected $fillable = [
        ""
    ]

    public function officers(){
        return $this->hasMany(Officer::class, 'homeworld_id');
    }
}
