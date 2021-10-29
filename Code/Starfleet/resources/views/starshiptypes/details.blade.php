@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Details of Starship Type [{{ $starshiptype->name }}]</h3>

        <dl class="row mt-5">
			<dt class="col-sm-2">Name</dt>
			<dd class='col-sm-10'>{{ $starshiptype->name }}</dd>

			<dt class="col-sm-2">Image</dt>
			<dd class='col-sm-10'>{{ $starshiptype->image_name }}</dd>


        </dl>

        <a href="/starships/types">Back</a> |
        <a href="/starships/types/{{ $starshiptype->id }}/edit">Edit</a>

    </div>
@endsection

