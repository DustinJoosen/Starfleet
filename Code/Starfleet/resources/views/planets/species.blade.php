@extends('layouts.app')

@section("content")
    <div class="container">
        <h3>Species of planet [{{ $planet->name }}]</h3>

        <div class="d-flex mt-5">
            <div class="col-6">
                <h5>Add Species</h5>
                <form method="post" action="/planets/{{ $planet->id }}/species/store">
                    @csrf

                    <div class="input-group">
                        <select name="species_id" class="custom-select col-6">
                            <option disabled selected value>Select planet</option>
                            @foreach($species as $species_)
                                <option value="{{ $species_->id }}">{{ $species_->name }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Add</button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-6">
                <table class="table">
                    @foreach($planet->species as $species)
                        <tr>
                            <td>{{ $species->name }}</td>
                            <td>
                                <a href="/planets/{{ $planet->id }}/species/{{ $species->id }}/remove" class="btn btn-outline-danger">x</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <a href="/planets" class="mt-3">Back</a>


    </div>
@endsection
