<?php

namespace App\Http\Controllers;

use App\Models\Planet;
use App\Models\Species;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index(){
        $this->authorize("viewAny", Species::class);

        return view('species.index',[
            'species' => Species::all()
        ]);
    }

    public function planets(Species $species){
        $this->authorize("view", $species);

        //get all the planets that are not yet attached to the species
        $planets = Planet::all();
        $filtered_planets = [];

        foreach($planets as $planet){
            if(!$species->planets->contains('id', $planet->id)){
                array_push($filtered_planets, $planet);
            }
        }

        return view('species.planets',[
            'species' => $species,
            'planets' => $filtered_planets
        ]);
    }

    public function store_planet(Request $request, Species $species){
        $this->authorize("create", Species::class);

        $planet_id = $request->input('planet_id') ?? null;
        $planet = Planet::findOrFail($planet_id);

        $species->planets()->save($planet);
        return redirect('/species/' . $species->id . '/planets');
    }

    public function delete_planet(Species $species, Planet $planet){
        $this->authorize("delete", $species);

        $species->planets()->detach($planet);
        return redirect('/species/' . $species->id . '/planets');
    }

    public function create(){
        $this->authorize('create', Species::class);
        return view('species.create');
    }

    public function store(Request $request){
        $this->authorize('create', Species::class);

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
        $this->authorize("update", $species);

        return view('species.edit', [
            'species' => $species
        ]);
    }

    public function update(Request $request, Species $species){
        $this->authorize("update", $species);

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
        $this->authorize("view", $species);

        return view('species.details', [
            'species' => $species
        ]);
    }

    public function delete(Request $request, Species $species){
        $this->authorize("delete", $species);

        $species->delete();
        return redirect('/species');
    }
}
