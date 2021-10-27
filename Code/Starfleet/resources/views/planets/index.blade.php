@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Planets</h3>
        <a href="/planets/create">Add planet</a>

        <table class="table mt-4">
            <tr>
				<th>Name</th>
                <th>Planet Class</th>
                <th>Sector</th>
				<th>Quadrant</th>
				<th>Has life</th>
				<th></th>
            </tr>
 			@foreach($planets as $planet)
                <tr>
                    <td>{{ $planet->name }}</td>
                    <td>{{ $planet->planet_class->name }}</td>
					<td>{{ $planet->sector }}</td>
					<td>{{ $planet->quadrant }}</td>
					<td>{{ $planet->has_life == 1 ? "Yes" : "No" }}</td>

                    <td>
                        <a href="/planets/{{ $planet->id }}/edit">Edit</a> |
                        <a href="/planets/{{ $planet->id }}/species">Species</a> |
                        <a href="/planets/{{ $planet->id }}/details">Details</a> |
                        <a href="/planets/{{ $planet->id }}/delete">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection

