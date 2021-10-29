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

            @if($species->abilities != null)
		    	<dt class="col-sm-2">Abilities</dt>
			    <dd class='col-sm-10'>{{ $species->abilities }}</dd>
            @endif

			<dt class="col-sm-2">Notes</dt>
			<dd class='col-sm-10'>{{ $species->notes }}</dd>
        </dl>

        @if($species->planets->count() > 0)
            <h5 class="mt-5">Planets</h5>
            <div class="col-3">
                <table class="table">
                    @foreach($species->planets as $planet)
                        <tr>
                            <td>{{ $planet->name }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif

        <a href="/species">Back</a> |
        <a href="/species/{{ $species->id }}/edit">Edit</a>


    </div>
@endsection

