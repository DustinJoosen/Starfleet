@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Officers</h3>
        <a href="/officers/create">Add officer</a>

        <table class="table mt-4">
            <tr>
				<th>Name</th>
				<th>Species</th>
				<th>Homeworld</th>
				<th>Rank</th>
				<th>Department</th>
				<th></th>
            </tr>
 			@foreach($officers as $officer)
                <tr>
					<td>{{ $officer->name }}</td>
					<td><a href="/species/{{ $officer->species->id }}/details">{{ $officer->species->name }}</a></td>
					<td><a href="/planets/{{ $officer->homeworld->id ?? '' }}/details">{{ $officer->homeworld->name ?? '' }}</a></td>
					<td>{{ $officer->rank->name }}</td>
					<td>{{ $officer->department->name }}</td>

                    <td>
                        <a href="/officers/{{ $officer->id }}/edit">Edit</a> |
                        <a href="/officers/{{ $officer->id }}/details">Details</a> |
                        <a href="/officers/{{ $officer->id }}/delete">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection

