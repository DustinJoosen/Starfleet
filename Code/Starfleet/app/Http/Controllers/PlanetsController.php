<?php

namespace App\Http\Controllers;

use App\Models\Planet;
use App\Models\PlanetClass;
use App\Models\Species;
use Illuminate\Http\Request;

class PlanetsController extends Controller
{

    public function index(){
        return view('planets.index',[
            'planets' => Planet::all()
        ]);
    }


    public function species(Planet $planet){
        $species = Species::all();
        $filtered_species = [];

        foreach($species as $species_){
            if(!$planet->species->contains('id', $species_->id)){
                array_push($filtered_species, $species_);
            }
        }

        return view('planets.species',[
            'planet' => $planet,
            'species' => $filtered_species
        ]);
    }

    public function store_species(Request $request, Planet $planet){
        $species_id = $request->input('species_id') ?? null;
        $species = Species::findOrFail($species_id);

        $planet->species()->save($species);
        return redirect('/planets/' . $planet->id . '/species');
    }

    public function delete_species(Planet $planet, Species $species){
        $planet->species()->detach($species);
        return redirect('/planets/' . $planet->id . '/species');
    }

    public function create(){
        return view('planets.create',[
            'planet_classes' => PlanetClass::all()
        ]);
    }

    public function store(Request $request){
		$data = $request->validate([
			'planetclass_id' => ["required"],
			'name' => ['required'],
			'sector' => '',
			'quadrant' => '',
			'has_life' => '',
		]);

		$data = array_merge(
		    $data,
            ["has_life" => isset($data["has_life"])]
        );

        Planet::create($data);
        return redirect('/planets');
    }

    public function edit(Request $request, Planet $planet){
        return view('planets.edit', [
            'planet' => $planet,
            'planet_classes' => PlanetClass::all(),
            'quadrants' => ['Alpha', 'Beta', 'Gamma', 'Delta']
        ]);
    }

    public function update(Request $request, Planet $planet){
        $data = $request->validate([
            'planetclass_id' => 'required',
            'name' => 'required',
            'sector' => '',
            'quadrant' => '',
            'has_life' => '',
        ]);

		$planet->planetclass_id = $data["planetclass_id"];
		$planet->name = $data["name"];
		$planet->sector = $data["sector"];
		$planet->quadrant = $data["quadrant"];
        $planet->has_life = isset($data["has_life"]);

        $planet->push();
        return redirect('/planets');
    }

    public function details(Request $request, Planet $planet){
        return view('planets.details', [
            'planet' => $planet
        ]);
    }

    public function delete(Request $request, Planet $planet){
        $planet->delete();
        return redirect('/planets');
    }
}
