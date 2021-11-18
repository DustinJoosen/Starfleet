<?php

namespace App\Http\Controllers;

use App\Models\StarshipType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StarshipTypesController extends Controller
{

    public function index(){
        return view('starshiptypes.index',[
            'starshiptypes' => StarshipType::all()
        ]);
    }

    public function create(){
        $this->authorize("create", StarshipType::class);

        return view('starshiptypes.create');
    }

    public function store(Request $request){
        $this->authorize("create", StarshipType::class);

        $data = $request->validate([
			'name' => 'required',
			'image_name' => ['image'],
		]);

		if(isset($data["image_name"])){
    		//store the image and get the name
	    	$image_fp = $data["image_name"]->store('uploads', 'public');

	    	$data = array_merge(
	    	    $data,
                ["image_name" => $image_fp]
            );
        }

        StarshipType::create([
            "name" => $data["name"],
            "image_name" => $data["image_name"] ?? "notfound.png"
        ]);

        return redirect('/starships/types');
    }

    public function edit(Request $request, StarshipType $starshiptype){
        $this->authorize("update", $starshiptype);

        return view('starshiptypes.edit', [
            'starshiptype' => $starshiptype
        ]);
    }

    public function update(Request $request, StarshipType $starshiptype){
        $this->authorize("update", $starshiptype);

        $data = $request->validate([
			'name' => 'required',
			'image_name' => ['image'],
		]);

        if(isset($data["image_name"])){
            $starshiptype->delete_image();

            //store the image and set the name
            $image_fp = $data["image_name"]->store('uploads', 'public');
            $starshiptype->image_name = $image_fp ?? "notfound.png";

        }


        $starshiptype->name = $data["name"];
        $starshiptype->push();

        return redirect('/starships/types');
    }

    public function details(Request $request, StarshipType $starshiptype){
        return view('starshiptypes.details', [
            'starshiptype' => $starshiptype
        ]);
    }

    public function delete(Request $request, StarshipType $starshiptype){
        $this->authorize("delete", $starshiptype);

        $starshiptype->delete_image();
        $starshiptype->delete();
        return redirect('/starships/types');
    }
}
