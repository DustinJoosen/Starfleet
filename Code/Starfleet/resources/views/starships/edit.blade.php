@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Edit Starship [{{ $starship->name }}]</h3>
            </div>
            <div class="card-body">
                <form action="/starships/{{ $starship->id }}/update" method="post">
                    @csrf
                    @method("PUT")

                    <div class="form-group row mt-3">
                        <label for="rank_id" class="col-md-4 col-form-label text-md-right">Starship Type</label>
                        <div class="col-md-4">
                            <select id="starshiptype_id" name="starshiptype_id" class="custom-select">
                                @foreach($ship_types as $ship_type)
                                    <option value="{{ $ship_type->id }}" @if($ship_type->id == $starship->starshiptype_id) selected @endif >{{ $ship_type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

					<div class="form-group row mt-3">
						<label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

						<div class="col-md-4">
							<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $starship->name }}" autofocus>

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
							<input type="text" id="prefix" name="prefix" class="form-control @error('prefix') is-invalid @enderror" value="{{ old('prefix') ?? $starship->prefix  }}" autofocus>

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
							<input type="text" id="registry" name="registry" class="form-control @error('registry') is-invalid @enderror" value="{{ old('registry') ?? $starship->registry  }}" autofocus>

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
							<input type="checkbox" id="is_active" name="is_active" class=" @error('is_active') is-invalid @enderror" @if($starship->is_active) checked @endif >

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
							<input type="date" id="build_at" name="build_at" class="form-control @error('build_at') is-invalid @enderror" value="{{ date_format(date_create($starship->created_at), 'Y-m-d') }}" autofocus>

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
							<input type="date" id="destroyed_at" name="destroyed_at" class="form-control @error('destroyed_at') is-invalid @enderror" value="{{$starship->destroyed_at != null ? date_format(date_create($starship->destroyed_at), 'Y-m-d') : ''}}" autofocus>

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
							<input type="text" id="status" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status') ?? $starship->status  }}" autofocus>

							@error("status")
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>


                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-outline-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection

