@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Details of Planet [{{ $planet->name }}]</h3>

        <dl class="row mt-5">
			<dt class="col-sm-2">Planet Class</dt>
			<dd class='col-sm-10'>{{ $planet->planet_class->name }}</dd>

			<dt class="col-sm-2">Name</dt>
			<dd class='col-sm-10'>{{ $planet->name }}</dd>

			<dt class="col-sm-2">Sector</dt>
			<dd class='col-sm-10'>{{ $planet->sector }}</dd>

			<dt class="col-sm-2">Quadrant</dt>
			<dd class='col-sm-10'>{{ $planet->quadrant }}</dd>

			<dt class="col-sm-2">Has life</dt>
			<dd class='col-sm-10'>{{ $planet->has_life == 0 ? 'no' : 'yes' }}</dd>


        </dl>

        <a href="/planets">Back</a>

    </div>
@endsection

