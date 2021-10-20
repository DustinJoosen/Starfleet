<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Officer;
use App\Models\Planet;
use App\Models\Rank;
use App\Models\Species;
use Illuminate\Http\Request;

class OfficersController extends Controller
{

    public function index(){
        return view('officers.index',[
            'officers' => Officer::all()
        ]);
    }

    public function create(){
        return view('officers.create',[
            'species' => Species::all(),
            'planets' => Planet::all(),
            'ranks' => Rank::all(),
            'departments' => Department::all()
        ]);
    }

    public function store(Request $request){
		$data = $request->validate([
			'name' => 'required',
			'species_id' => 'required',
			'homeworld_id' => '',
			'rank_id' => 'required',
			'department_id' => 'required',
			'born_at' => 'required',
			'deceased_at' => '',
			'assignment' => '',
		]);

        Officer::create(array_merge(
            $data,
            ['user_id' => 1]
        ));
        return redirect('/officers');
    }

    public function edit(Request $request, Officer $officer){
        return view('officers.edit', [
            'officer' => $officer,
            'species' => Species::all(),
            'planets' => Planet::all(),
            'ranks' => Rank::all(),
            'departments' => Department::all()
        ]);
    }

    public function update(Request $request, Officer $officer){
        $data = $request->validate([
            'name' => 'required',
            'species_id' => 'required',
            'homeworld_id' => '',
            'rank_id' => 'required',
            'department_id' => 'required',
            'born_at' => 'required',
            'deceased_at' => '',
            'assignment' => '',
        ]);

		$officer->name = $data["name"];
		$officer->species_id = $data["species_id"];
		$officer->homeworld_id = $data["homeworld_id"];
		$officer->rank_id = $data["rank_id"];
		$officer->department_id = $data["department_id"];
		$officer->born_at = $data["born_at"];
		$officer->deceased_at = $data["deceased_at"];
		$officer->assignment = $data["assignment"];

        $officer->push();
        return redirect('/officers');
    }

    public function details(Request $request, Officer $officer){
        return view('officers.details', [
            'officer' => $officer
        ]);
    }

    public function delete(Request $request, Officer $officer){
        $officer->delete();
        return redirect('/officers');
    }
}
