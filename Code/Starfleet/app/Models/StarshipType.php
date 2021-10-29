<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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

    public function get_image_url(){
        return ("/storage/" . ($this->image_name ?? "notfound.png"));
    }

    public function delete_image()
    {
        if(Storage::exists("public/" . $this->image_name) && $this->image_name != "notfound.png"){
            Storage::delete('public/' . $this->image_name);
        }
    }

}
