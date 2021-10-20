@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Edit Officer [{{ $officer->name }}]</h3>
            </div>
            <div class="card-body">
                <form action="/officers/{{$officer->id}}/update" method="post">
                    @csrf
                    @method("PUT")

					<div class="form-group row mt-3">
						<label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

						<div class="col-md-4">
							<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $officer->name }}" autofocus>

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
                                @foreach($species as $s)
                                    <option value="{{ $s->id }}" @if($s->id == $officer->species_id) selected @endif>{{ $s->name }}</option>
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
                                    <option value="{{ $planet->id }}" @if($planet->id == $officer->homeworld_id) selected @endif>{{ $planet->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="rank_id" class="col-md-4 col-form-label text-md-right">Rank</label>
                        <div class="col-md-4">
                            <select id="rank_id" name="rank_id" class="custom-select">
                                @foreach($ranks as $rank)
                                    <option value="{{ $rank->id }}" @if($rank->id == $officer->rank_id) selected @endif>{{ $rank->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="department_id" class="col-md-4 col-form-label text-md-right">Department</label>
                        <div class="col-md-4">
                            <select id="department_id" name="department_id" class="custom-select">
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" @if($department->id == $officer->department_id) selected @endif>{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

					<div class="form-group row mt-3">
						<label for="born_at" class="col-md-4 col-form-label text-md-right">Born At</label>

						<div class="col-md-4">
							<input type="date" id="born_at" name="born_at" class="form-control @error('born_at') is-invalid @enderror" value="{{ date_format(date_create($officer->born_at), 'Y-m-d') }}" autofocus>

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
							<input type="date" id="deceased_at" name="deceased_at" class="form-control @error('deceased_at') is-invalid @enderror" value="{{ $officer->deceased_at != null ? date_format(date_create($officer->deceased_at), 'Y-m-d') : '' }}" autofocus>

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
							<input type="text" id="assignment" name="assignment" class="form-control @error('assignment') is-invalid @enderror" value="{{ old('assignment') ?? $officer->assignment }}" autofocus>

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

