@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Details of Officer [{{ $officer->name }}]</h3>

        <dl class="row mt-5">
			<dt class="col-sm-2">Name</dt>
			<dd class='col-sm-10'>{{ $officer->name }}</dd>

			<dt class="col-sm-2">Species</dt>
			<dd class='col-sm-10'>{{ $officer->species->name }}</dd>

            @if($officer->homeworld_id != null)
		    	<dt class="col-sm-2">Homeworld</dt>
			    <dd class='col-sm-10'>{{ $officer->homeworld->name }}</dd>
            @endif

			<dt class="col-sm-2">Rank</dt>
			<dd class='col-sm-10'>{{ $officer->rank->name }}</dd>

			<dt class="col-sm-2">Department</dt>
			<dd class='col-sm-10'>{{ $officer->department->name }}</dd>

			<dt class="col-sm-2">Born at</dt>
			<dd class='col-sm-10'>{{ date_format(date_create($officer->born_at), 'd M Y') }}</dd>

            @if($officer->deceased_at != null)
			    <dt class="col-sm-2">Deceased at</dt>
		    	<dd class='col-sm-10'>{{ date_format(date_create($officer->deceased_at), 'd M Y') }}</dd>
            @endif

            @if($officer->assignment != null)
	    		<dt class="col-sm-2">Assignment</dt>
    			<dd class='col-sm-10'>{{ $officer->assignment }}</dd>
            @endif

        </dl>

        <a href="/officers">Back</a>

    </div>
@endsection

