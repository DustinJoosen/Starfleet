@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Species</h3>

        @can("create", App\Models\Species::class)
            <a href="/species/create">Add species</a>
        @endcan

        <table class="table mt-4">
            <tr>
				<th>Name</th>
				<th>Is humanoid</th>
				<th>Is federation</th>
				<th></th>
            </tr>
 			@foreach($species as $species)
                <tr>
					<td>{{ $species->name }}</td>
					<td>{{ $species->is_humanoid == 0 ? "No" : "Yes" }}</td>
					<td>{{ $species->is_federation == 0 ? "No" : "Yes" }}</td>

                    <td>
                        @can("update", $species)
                            <a href="/species/{{ $species->id }}/edit">Edit</a> |
                        @endcan
                        <a href="/species/{{ $species->id }}/planets">Planets</a> |
                        <a href="/species/{{ $species->id }}/details">Details</a>
                        @can("delete", $species)
                            | <a href="/species/{{ $species->id }}/delete">Delete</a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection

