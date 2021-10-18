<?php

namespace App\Http\Controllers;

use App\Models\StarshipType;
use Illuminate\Http\Request;

class StarshipTypesController extends Controller
{

    public function index(){
        return view('starshiptypes.index',[
            'starshiptypes' => StarshipType::all()
        ]);
    }

    public function create(){
        return view('starshiptypes.create');
    }

    public function store(Request $request){
		$data = $request->validate([
			'name' => 'required',
			'image_name' => '',
		]);

        StarshipType::create($data);
        return redirect('/starships/types');
    }

    public function edit(Request $request, StarshipType $starshiptype){
        return view('starshiptypes.edit', [
            'starshiptype' => $starshiptype
        ]);
    }

    public function update(Request $request, StarshipType $starshiptype){
		$data = $request->validate([
			'name' => 'required',
			'image_name' => 'required',
		]);

		$starshiptype->name = $data["name"];
		$starshiptype->image_name = $data["image_name"];

        $starshiptype->push();
        return redirect('/starships/types');
    }

    public function details(Request $request, StarshipType $starshiptype){
        return view('starshiptypes.details', [
            'starshiptype' => $starshiptype
        ]);
    }

    public function delete(Request $request, StarshipType $starshiptype){
        $starshiptype->delete();
        return redirect('/starships/types');
    }
}
