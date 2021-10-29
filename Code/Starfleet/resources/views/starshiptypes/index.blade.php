@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Starship Types</h3>
        <a href="/starships/types/create">Add starship type</a> |
        <a href="/starships">Manage starships</a>

        <table class="table mt-4">
            <tr>
                <th>Image</th>
                <th>Name</th>
				<th></th>
            </tr>
 			@foreach($starshiptypes as $starshiptype)
                <tr>
                    <td><img src="{{ $starshiptype->get_image_url() }}" width="120" height="120"/></td>
                    <td>{{ $starshiptype->name }}</td>

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

