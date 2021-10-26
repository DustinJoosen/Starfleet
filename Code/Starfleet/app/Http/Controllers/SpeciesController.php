<?php

namespace App\Http\Controllers;

use App\Models\Species;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{

    public function index(){
        return view('species.index',[
            'species' => Species::all()
        ]);
    }

    public function create(){
        return view('species.create');
    }

    public function store(Request $request){
		$data = $request->validate([
			'name' => 'required',
			'is_humanoid' => '',
			'is_federation' => '',
			'abilities' => '',
			'notes' => 'required',
		]);

		$species = array_merge(
		    $data,
            [
                "is_humanoid" => isset($data["is_humanoid"]),
                "is_federation" => isset($data["is_federation"])
            ]
        );

        Species::create($species);
        return redirect('/species');
    }

    public function edit(Request $request, Species $species){
        return view('species.edit', [
            'species' => $species
        ]);
    }

    public function update(Request $request, Species $species){
		$data = $request->validate([
			'name' => 'required',
			'is_humanoid' => '',
			'is_federation' => '',
			'abilities' => '',
			'notes' => 'required',
		]);

		$species->name = $data["name"];
		$species->is_humanoid = isset($data["is_humanoid"]);
		$species->is_federation = isset($data["is_federation"]);
		$species->abilities = $data["abilities"];
		$species->notes = $data["notes"];

        $species->push();
        return redirect('/species');
    }

    public function details(Request $request, Species $species){
        return view('species.details', [
            'species' => $species
        ]);
    }

    public function delete(Request $request, Species $species){
        $species->delete();
        return redirect('/species');
    }
}
