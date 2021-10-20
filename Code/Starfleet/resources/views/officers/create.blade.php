@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Add Officer</h3>
            </div>
            <div class="card-body">
                <form action="/officers/store" method="post">
                    @csrf

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
                        <label for="species_id" class="col-md-4 col-form-label text-md-right">Species</label>
                        <div class="col-md-4">
                            <select id="species_id" name="species_id" class="custom-select">
                                <option disabled selected value>Choose species</option>
                                @foreach($species as $s)
                                    <option value="{{ $s->id }}">{{ $s->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="homeworld_id" class="col-md-4 col-form-label text-md-right">Homeworld</label>
                        <div class="col-md-4">
                            <select id="homeworld_id" name="homeworld_id" class="custom-select">
                                <option selected value>None</option>
                                @foreach($planets as $planet)
                                    <option value="{{ $planet->id }}">{{ $planet->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="rank_id" class="col-md-4 col-form-label text-md-right">Rank</label>
                        <div class="col-md-4">
                            <select id="rank_id" name="rank_id" class="custom-select">
                                <option disabled selected value>Choose rank</option>
                                @foreach($ranks as $rank)
                                    <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="department_id" class="col-md-4 col-form-label text-md-right">Department</label>
                        <div class="col-md-4">
                            <select id="department_id" name="department_id" class="custom-select">
                                <option disabled selected value>Choose department</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

					<div class="form-group row mt-3">
						<label for="born_at" class="col-md-4 col-form-label text-md-right">Born At</label>

						<div class="col-md-4">
							<input type="date" id="born_at" name="born_at" class="form-control @error('born_at') is-invalid @enderror" value="{{ old('born_at') }}" autofocus>

							@error("born_at")
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row mt-3">
						<label for="deceased_at" class="col-md-4 col-form-label text-md-right">Deceased At</label>

						<div class="col-md-4">
							<input type="date" id="deceased_at" name="deceased_at" class="form-control @error('deceased_at') is-invalid @enderror" value="{{ old('deceased_at') }}" autofocus>

							@error("deceased_at")
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row mt-3">
						<label for="assignment" class="col-md-4 col-form-label text-md-right">Assignment</label>

						<div class="col-md-4">
							<input type="text" id="assignment" name="assignment" class="form-control @error('assignment') is-invalid @enderror" value="{{ old('assignment') }}" autofocus>

							@error("assignment")
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>


                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-outline-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection

