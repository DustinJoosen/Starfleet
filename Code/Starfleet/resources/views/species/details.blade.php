@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Details of Species [{{ $species->name }}]</h3>

        <dl class="row mt-5">
			<dt class="col-sm-2">Name</dt>
			<dd class='col-sm-10'>{{ $species->name }}</dd>

			<dt class="col-sm-2">Is humanoid</dt>
			<dd class='col-sm-10'>{{ $species->is_humanoid == 0 ? "No" : "Yes" }}</dd>

			<dt class="col-sm-2">Is federation</dt>
			<dd class='col-sm-10'>{{ $species->is_federation == 0 ? "No" : "Yes" }}</dd>

			<dt class="col-sm-2">Abilities</dt>
			<dd class='col-sm-10'>{{ $species->abilities }}</dd>

			<dt class="col-sm-2">Notes</dt>
			<dd class='col-sm-10'>{{ $species->notes }}</dd>


        </dl>

        <a href="/species">Back</a>

    </div>
@endsection

