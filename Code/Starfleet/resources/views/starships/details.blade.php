@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Details of Starship [{{ $starship->name }}]</h3>

        <div class="d-flex mt-5">
            <div class="col-6">
                <h5>Ship specs</h5>
                <dl class="row mt-3">
                    <dt class="col-sm-4">Starship Type</dt>
                    <dd class='col-sm-8'>
                        <a href="/starships/types/{{ $starship->starship_type->id }}/details">{{ $starship->starship_type->name }}</a>
                    </dd>

                    <dt class="col-sm-4">Name</dt>
                    <dd class='col-sm-8'>{{ $starship->name }}</dd>

                    <dt class="col-sm-4">Registry</dt>
                    <dd class='col-sm-8'>{{ $starship->prefix }} {{ $starship->registry }}</dd>

                    <dt class="col-sm-4">Is Active</dt>
                    <dd class='col-sm-8'>{{ $starship->is_active == 0 ? "No" : "Yes" }}</dd>

                    <dt class="col-sm-4">Build at</dt>
                    <dd class='col-sm-8'>{{ date_format(date_create($starship->build_at), 'd M Y') }}</dd>

                    @if($starship->destroyed_at != null)
                        <dt class="col-sm-4">Destroyed at</dt>
                        <dd class='col-sm-8'>{{ date_format(date_create($starship->destroyed_at), 'd M Y') }}</dd>
                    @endif

                    <dt class="col-sm-4">Status</dt>
                    <dd class='col-sm-8'>{{ $starship->status }}</dd>
                </dl>
            </div>
            <div class="col-6">
                <h5>Crew</h5>

                <dl class="row mt-3">
                    <dt class="col-sm-4">Captain</dt>
                    <dd class="col-sm-8">
                        <a href="/officers/{{ $starship->crew->captain->id }}/details">{{ $starship->crew->captain->name }}</a>
                    </dd>

                    @if($starship->crew->first_officer->name ?? false)
                    <dt class="col-sm-4">First Officer</dt>
                    <dd class="col-sm-8">
                        <a href="/officers/{{ $starship->crew->first_officer->id }}/details">{{ $starship->crew->first_officer->name }}</a>
                    </dd>
                    @endif

                    @if($starship->crew->second_officer->name ?? false)
                    <dt class="col-sm-4">Second Officer</dt>
                    <dd class="col-sm-8">
                        <a href="/officers/{{ $starship->crew->second_officer->id }}/details">{{ $starship->crew->second_officer->name }}</a>
                    </dd>
                    @endif

                    @if($starship->crew->chief_engineering->name ?? false)
                    <dt class="col-sm-4">Chief Engineer</dt>
                    <dd class="col-sm-8">
                        <a href="/officers/{{ $starship->crew->chief_engineering->id }}/details">{{ $starship->crew->chief_engineering->name }}</a>
                    </dd>
                    @endif

                    @if($starship->crew->chief_medical->name ?? false)
                    <dt class="col-sm-4">Chief Medical</dt>
                    <dd class="col-sm-8">
                        <a href="/officers/{{ $starship->crew->chief_medical->id }}/details">{{ $starship->crew->chief_medical->name }}</a>
                    </dd>
                    @endif

                    @if($starship->crew->chief_security->name ?? false)
                    <dt class="col-sm-4">Chief Security</dt>
                        <dd class="col-sm-8"><a href="/officers/{{ $starship->crew->chief_security->id }}/details">{{ $starship->crew->chief_security->name }}</a></dd>
                    @endif

                </dl>
            </div>
        </div>


        <a href="/starships">Back</a> |
        <a href="/starships/{{ $starship->id }}/edit">Edit</a>

    </div>
@endsection

