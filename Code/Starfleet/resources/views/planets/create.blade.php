@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Add Planet</h3>
            </div>
            <div class="card-body">
                <form action="/planets/store" method="post">
                    @csrf

					<div class="form-group row mt-3">
                        <label for="planetclass_id" class="col-md-4 col-form-label text-md-right">Planet Class</label>
                        <div class="col-md-4">
                            <select id="planetclass_id" name="planetclass_id" class="custom-select">
                                <option disabled selected value>Choose planet class</option>
                                @foreach($planet_classes as $planet_class)
                                    <option value="{{ $planet_class->id }}">{{ $planet_class->name }}</option>
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
						<label for="sector" class="col-md-4 col-form-label text-md-right">Sector</label>

						<div class="col-md-4">
							<input type="text" id="sector" name="sector" class="form-control @error('sector') is-invalid @enderror" value="{{ old('sector') }}" autofocus>

							@error("sector")
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

                    <div class="form-group row mt-3">
                        <label for="quadrant" class="col-md-4 col-form-label text-md-right">Quadrant</label>
                        <div class="col-md-4">
                            <select id="quadrant" name="quadrant" class="custom-select">
                                <option disabled selected value>Choose quadrant</option>
                                <option value="Alpha">Alpha</option>
                                <option value="Beta">Beta</option>
                                <option value="Gamma">Gamma</option>
                                <option value="Delta">Delta</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="has_life" class="col-md-4 col-form-label text-md-right">Has Life</label>
                        <div class="col-md-4">
                            <label class="switch">
                                <input type="checkbox" name="has_life" >
                                <span class="slider round"></span>
                            </label>
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

