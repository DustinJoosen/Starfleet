<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\Officer;
use App\Models\Starship;
use App\Models\StarshipType;
use Illuminate\Http\Request;

class StarshipsController extends Controller
{

    public function index(){
        return view('starships.index',[
            'starships' => Starship::all()
        ]);
    }

    public function create(){
        return view('starships.create', [
            'ship_types' => StarshipType::all(),
            'officers' => Officer::all()
        ]);
    }

    public function store(Request $request){
		$data = $request->validate([
			'starshiptype_id' => 'required',
			'name' => 'required',
			'prefix' => '',
			'registry' => 'required',
			'is_active' => '',
			'build_at' => 'required',
			'destroyed_at' => '',
			'status' => 'required',
            'captain_id' => 'required',
            'firstofficer_id' => '',
            'secondofficer_id' => '',
            'chiefengineer_id' => '',
            'chiefsecurity_id' => '',
            'chiefmedical_id' => ''
		]);

		$ship = array_merge(
		    $data,
            ["is_active" => isset($data["is_active"])]
        );

		$crew = Crew::create([
		    'captain_id' => $data["captain_id"],
		    'firstofficer_id' => $data["firstofficer_id"] ?? null,
		    'secondofficer_id' => $data["secondofficer_id"] ?? null,
		    'chiefengineer_id' => $data["chiefengineer_id"] ?? null,
		    'chiefsecurity_id' => $data["chiefsecurity_id"] ?? null,
		    'chiefmedical_id' => $data["chiefmedical_id"] ?? null,
        ]);

		$crew->starship()->create($ship);

        return redirect('/starships');
    }

    public function edit(Request $request, Starship $starship){
        return view('starships.edit', [
            'starship' => $starship,
            'ship_types' => StarshipType::all(),
            'officers' => Officer::all()
        ]);
    }

    public function update(Request $request, Starship $starship){
        $data = $request->validate([
            'starshiptype_id' => 'required',
            'name' => 'required',
            'prefix' => '',
            'registry' => 'required',
            'is_active' => '',
            'build_at' => 'required',
            'destroyed_at' => '',
            'status' => 'required',
            'captain_id' => 'required',
            'firstofficer_id' => '',
            'secondofficer_id' => '',
            'chiefengineering_id' => '',
            'chiefsecurity_id' => '',
            'chiefmedical_id' => ''
        ]);

		$starship->starshiptype_id = $data["starshiptype_id"];
		$starship->name = $data["name"];
		$starship->prefix = $data["prefix"];
		$starship->registry = $data["registry"];
		$starship->is_active = isset($data["is_active"]);
		$starship->build_at = $data["build_at"];
		$starship->destroyed_at = $data["destroyed_at"];
		$starship->status = $data["status"];

		$crew = $starship->crew;

		$crew->captain_id = $data["captain_id"];
		$crew->firstofficer_id = $data["firstofficer_id"] ?? null;
		$crew->secondofficer_id = $data["secondofficer_id"] ?? null;
		$crew->chiefengineering_id = $data["chiefengineering_id"] ?? null;
		$crew->chiefsecurity_id = $data["chiefsecurity_id"] ?? null;
		$crew->chiefmedical_id = $data["chiefmedical_id"] ?? null;

        $starship->push();
        return redirect('/starships');
    }

    public function details(Request $request, Starship $starship){
        return view('starships.details', [
            'starship' => $starship
        ]);
    }

    public function delete(Request $request, Starship $starship){
        $starship->delete();
        $starship->crew()->delete();
        return redirect('/starships');
    }
}
