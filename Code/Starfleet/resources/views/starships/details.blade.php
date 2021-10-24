@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Details of Starship [{{ $starship->name }}]</h3>

        <dl class="row mt-5">
			<dt class="col-sm-2">Starship Type</dt>
			<dd class='col-sm-10'>{{ $starship->starship_type->name }}</dd>

			<dt class="col-sm-2">Name</dt>
			<dd class='col-sm-10'>{{ $starship->name }}</dd>

			<dt class="col-sm-2">Registry</dt>
			<dd class='col-sm-10'>{{ $starship->prefix }} {{ $starship->registry }}</dd>

			<dt class="col-sm-2">Is Active</dt>
			<dd class='col-sm-10'>{{ $starship->is_active == 0 ? "No" : "Yes" }}</dd>

			<dt class="col-sm-2">Build at</dt>
			<dd class='col-sm-10'>{{ date_format(date_create($starship->build_at), 'd M Y') }}</dd>

            @if($starship->destroyed_at != null)
			    <dt class="col-sm-2">Destroyed at</dt>
                <dd class='col-sm-10'>{{ date_format(date_create($starship->destroyed_at), 'd M Y') }}</dd>
            @endif

			<dt class="col-sm-2">Status</dt>
			<dd class='col-sm-10'>{{ $starship->status }}</dd>


        </dl>

        <a href="/starships">Back</a>

    </div>
@endsection

