@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Edit Starship Type [{{$starshiptype->name}}]</h3>
            </div>
            <div class="card-body">
                <form action="/starships/types/{{ $starshiptype->id }}/update" method="post">
                    @csrf
                    @method("PUT")

                    <div class="form-group row mt-3">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                        <div class="col-md-4">
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $starshiptype->name }}" autofocus>

                            @error("name")
                            <span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label for="image_name" class="col-md-4 col-form-label text-md-right">Image</label>

                        <div class="col-md-4">
                            <input type="text" id="image_name" name="image_name" class="form-control @error('image_name') is-invalid @enderror" value="{{ old('image_name') ?? $starshiptype->image_name }}" autofocus>

                            @error("image_name")
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

