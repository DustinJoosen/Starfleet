@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Species</h3>
        <a href="/species/create">Add species</a>

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
                        <a href="/species/{{ $species->id }}/edit">Edit</a> |
                        <a href="/species/{{ $species->id }}/planets">Planets</a> |
                        <a href="/species/{{ $species->id }}/details">Details</a> |
                        <a href="/species/{{ $species->id }}/delete">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection

