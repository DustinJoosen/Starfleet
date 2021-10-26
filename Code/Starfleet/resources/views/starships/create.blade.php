@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Add Starship</h3>
            </div>
            <div class="card-body">
                <form action="/starships/store" method="post">
                    @csrf

                    <!-- Ship form -->
                    <h4>Ship</h4>

                    <div class="form-group row mt-3">
                        <label for="starshiptype_id" class="col-md-4 col-form-label text-md-right">Starship Type</label>
                        <div class="col-md-4">
                            <select id="starshiptype_id" name="starshiptype_id" class="custom-select">
                                <option disabled selected value>Choose starship type</option>
                                @foreach($ship_types as $ship_type)
                                    <option value="{{ $ship_type->id }}">{{ $ship_type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                        <div class="col-md-4">
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autofocus>

                            @error("name")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="prefix" class="col-md-4 col-form-label text-md-right">Prefix</label>

                        <div class="col-md-4">
                            <input type="text" id="prefix" name="prefix" class="form-control @error('prefix') is-invalid @enderror" value="{{ old('prefix') ?? "NCC" }}" autofocus>

                            @error("prefix")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="registry" class="col-md-4 col-form-label text-md-right">Registry</label>

                        <div class="col-md-4">
                            <input type="text" id="registry" name="registry" class="form-control @error('registry') is-invalid @enderror" value="{{ old('registry') }}" autofocus>

                            @error("registry")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="is_active" class="col-md-4 col-form-label text-md-right">Is Active</label>

                        <div class="col-md-4">
                            <input type="checkbox" id="is_active" name="is_active" class=" @error('is_active') is-invalid @enderror" value="{{ old('is_active') }}" autofocus>

                            @error("is_active")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="build_at" class="col-md-4 col-form-label text-md-right">Build at</label>

                        <div class="col-md-4">
                            <input type="date" id="build_at" name="build_at" class="form-control @error('build_at') is-invalid @enderror" value="{{ old('build_at') }}" autofocus>

                            @error("build_at")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="destroyed_at" class="col-md-4 col-form-label text-md-right">Destroyed at</label>

                        <div class="col-md-4">
                            <input type="date" id="destroyed_at" name="destroyed_at" class="form-control @error('destroyed_at') is-invalid @enderror" value="{{ old('destroyed_at') }}" autofocus>

                            @error("destroyed_at")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>

                        <div class="col-md-4">
                            <input type="text" id="status" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status') }}" autofocus>

                            @error("status")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <hr/>

                    <!-- crew forms -->
                    <h4>Senior staff</h4>

                    <div class="form-group row mt-3">
                        <label for="captain_id" class="col-md-4 col-form-label text-md-right">Captain</label>
                        <div class="col-md-4">
                            <select id="captain_id" name="captain_id" class="custom-select">
                                <option disabled selected value>Choose officer</option>
                                @foreach($officers as $officer)
                                    <option value="{{ $officer->id }}">{{ $officer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="firstofficer_id" class="col-md-4 col-form-label text-md-right">First Officer</label>
                        <div class="col-md-4">
                            <select id="firstofficer_id" name="firstofficer_id" class="custom-select">
                                <option disabled selected value>Choose officer</option>
                                @foreach($officers as $officer)
                                    <option value="{{ $officer->id }}">{{ $officer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="secondofficer_id" class="col-md-4 col-form-label text-md-right">Second Officer</label>
                        <div class="col-md-4">
                            <select id="secondofficer_id" name="secondofficer_id" class="custom-select">
                                <option disabled selected value>Choose officer</option>
                                @foreach($officers as $officer)
                                    <option value="{{ $officer->id }}">{{ $officer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="chiefengineering_id " class="col-md-4 col-form-label text-md-right">Chief Engineer</label>
                        <div class="col-md-4">
                            <select id="chiefengineering_id" name="chiefengineering_id" class="custom-select">
                                <option disabled selected value>Choose officer</option>
                                @foreach($officers as $officer)
                                    <option value="{{ $officer->id }}">{{ $officer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="chiefsecurity_id" class="col-md-4 col-form-label text-md-right">Chief Security</label>
                        <div class="col-md-4">
                            <select id="chiefsecurity_id" name="chiefsecurity_id" class="custom-select">
                                <option disabled selected value>Choose officer</option>
                                @foreach($officers as $officer)
                                    <option value="{{ $officer->id }}">{{ $officer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="chiefmedical_id" class="col-md-4 col-form-label text-md-right">Chief Medical</label>
                        <div class="col-md-4">
                            <select id="chiefmedical_id" name="chiefmedical_id" class="custom-select">
                                <option disabled selected value>Choose officer</option>
                                @foreach($officers as $officer)
                                    <option value="{{ $officer->id }}">{{ $officer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <hr/>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-outline-primary">Create</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

