@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Starships</h3>
        <a href="/starships/create">Add starship</a> |
        <a href="/starships/types/">Manage starship types</a>

        <table class="table mt-4">
            <tr>
                <th>Name</th>
                <th>Registry</th>
                <th>Ship Type</th>
                <th>Is Active</th>
				<th>Status</th>
				<th></th>
            </tr>
 			@foreach($starships as $starship)
                <tr>
					<td>{{ $starship->name }}</td>
                    <td>{{ $starship->prefix }} {{ $starship->registry }}</td>
                    <td>{{ $starship->starship_type->name }}</td>
                    <td>{{ $starship->is_active == 0 ? "No" : "Yes" }}</td>
					<td>{{ $starship->status }}</td>

                    <td>
                        <a href="/starships/{{ $starship->id }}/edit">Edit</a> |
                        <a href="/starships/{{ $starship->id }}/details">Details</a> |
                        <a href="/starships/{{ $starship->id }}/delete">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection

