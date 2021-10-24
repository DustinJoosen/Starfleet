<?php

namespace App\Http\Controllers;

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
		]);

		$data = array_merge(
		    $data,
            ['crew_id' => 1]
        );

        Starship::create($data);
        return redirect('/starships');
    }

    public function edit(Request $request, Starship $starship){
        return view('starships.edit', [
            'starship' => $starship,
            'ship_types' => StarshipType::all()
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
        ]);

		$starship->starshiptype_id = $data["starshiptype_id"];
		$starship->name = $data["name"];
		$starship->prefix = $data["prefix"];
		$starship->registry = $data["registry"];
		$starship->is_active = $data["is_active"] == "on" ? 1 : 0;
		$starship->build_at = $data["build_at"];
		$starship->destroyed_at = $data["destroyed_at"];
		$starship->status = $data["status"];

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
        return redirect('/starships');
    }
}
