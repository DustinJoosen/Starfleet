@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Edit Species [{{ $species->name }}]</h3>
            </div>
            <div class="card-body">
                <form action="/species/{{ $species->id }}/update" method="post">
                    @csrf
                    @method("PUT")

					<div class="form-group row mt-3">
						<label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

						<div class="col-md-4">
							<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $species->name }}" autofocus>

							@error("name")
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row mt-3">
						<label for="is_humanoid" class="col-md-4 col-form-label text-md-right">Is humanoid</label>

						<div class="col-md-4">
							<input type="text" id="is_humanoid" name="is_humanoid" class="form-control @error('is_humanoid') is-invalid @enderror" value="{{ old('is_humanoid') ?? $species->is_humanoid }}" autofocus>

							@error("is_humanoid")
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row mt-3">
						<label for="is_federation" class="col-md-4 col-form-label text-md-right">Is federation</label>

						<div class="col-md-4">
							<input type="text" id="is_federation" name="is_federation" class="form-control @error('is_federation') is-invalid @enderror" value="{{ old('is_federation') ?? $species->is_federation }}" autofocus>

							@error("is_federation")
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row mt-3">
						<label for="abilities" class="col-md-4 col-form-label text-md-right">Abilities</label>

						<div class="col-md-4">
                            <textarea type="text" id="abilities" name="abilities" class="form-control @error('abilities') is-invalid @enderror" autofocus>{{ old('abilities') ?? $species->abilities}}</textarea>

							@error("abilities")
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row mt-3">
						<label for="notes" class="col-md-4 col-form-label text-md-right">Notes</label>

						<div class="col-md-4">
                            <textarea type="text" id="notes" name="notes" class="form-control @error('notes') is-invalid @enderror" autofocus>{{ old('notes') ?? $species->notes }}</textarea>

							@error("notes")
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

