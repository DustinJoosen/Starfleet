@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Starship Types</h3>
        <a href="/starships/types/create">Add starship type</a> |
        <a href="/starships">Manage starships</a>

        <table class="table mt-4">
            <tr>
				<th>Name</th>
				<th>Image</th>
				<th></th>
            </tr>
 			@foreach($starshiptypes as $starshiptype)
                <tr>
					<td>{{ $starshiptype->name }}</td>
					<td>{{ $starshiptype->image_name }}</td>

                    <td>
                        <a href="/starships/types/{{ $starshiptype->id }}/edit">Edit</a> |
                        <a href="/starships/types/{{ $starshiptype->id }}/details">Details</a> |
                        <a href="/starships/types/{{ $starshiptype->id }}/delete">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>


    </div>
@endsection

