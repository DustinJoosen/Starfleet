<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StarshipType extends Model
{
    use HasFactory;

    protected $table = "starshiptypes";
    protected $fillable = [
        "name",
        "image_name"
    ];

    public function starships(){
        return $this->hasMany(Starship::class);
    }

}
