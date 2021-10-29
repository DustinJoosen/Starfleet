@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Details of Starship [{{ $starship->name }}]</h3>

        <div class="d-flex mt-5">
            <div class="col-6">
                <h5>Ship specs</h5>
                <dl class="row mt-3">
                    <dt class="col-sm-4">Starship Type</dt>
                    <dd class='col-sm-8'>{{ $starship->starship_type->name }}</dd>

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
                    <dd class="col-sm-8">{{ $starship->crew->captain->name }}</dd>

                    @if($starship->crew->first_officer->name ?? false)
                    <dt class="col-sm-4">First Officer</dt>
                    <dd class="col-sm-8">{{ $starship->crew->first_officer->name }}</dd>
                    @endif

                    @if($starship->crew->second_officer->name ?? false)
                    <dt class="col-sm-4">Second Officer</dt>
                    <dd class="col-sm-8">{{ $starship->crew->second_officer->name }}</dd>
                    @endif

                    @if($starship->crew->chief_engineering->name ?? false)
                    <dt class="col-sm-4">Chief Engineer</dt>
                    <dd class="col-sm-8">{{ $starship->crew->chief_engineering->name }}</dd>
                    @endif

                    @if($starship->crew->chief_medical->name ?? false)
                    <dt class="col-sm-4">Chief Medical</dt>
                    <dd class="col-sm-8">{{ $starship->crew->chief_medical->name }}</dd>
                    @endif

                    @if($starship->crew->chief_security->name ?? false)
                    <dt class="col-sm-4">Chief Security</dt>
                    <dd class="col-sm-8">{{ $starship->crew->chief_security->name }}</dd>
                    @endif

                </dl>
            </div>
        </div>


        <a href="/starships">Back</a> |
        <a href="/starships/{{ $starship->id }}/edit">Edit</a>

    </div>
@endsection

