<?php

namespace App\Http\Controllers;

use App\Models\Planet;
use App\Models\PlanetClass;
use Illuminate\Http\Request;

class PlanetsController extends Controller
{

    public function index(){
        return view('planets.index',[
            'planets' => Planet::all()
        ]);
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
		$planet->has_life = $data["has_life"];

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
