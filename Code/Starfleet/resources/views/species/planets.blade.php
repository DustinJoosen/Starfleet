@extends('layouts.app')

@section("content")
    <div class="container">
        <h3>Planets of species [{{ $species->name }}]</h3>

        <div class="d-flex mt-5">
            <div class="col-6">
                <h5>Add Planet</h5>
                <form method="post" action="/species/{{ $species->id }}/planets/store">
                    @csrf


                    <div class="input-group">
                        <select name="planet_id" class="custom-select col-6">
                            <option disabled selected value>Select planet</option>
                            @foreach($planets as $planet)
                                <option value="{{ $planet->id }}">{{ $planet->name }}</option>
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
                    @foreach($species->planets as $planet)
                        <tr>
                            <td>{{ $planet->name }}</td>
                            <td>
                                <a href="/species/{{ $species->id }}/planets/{{ $planet->id }}/remove" class="btn btn-outline-danger">x</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <a href="/species" class="mt-3">Back</a>

    </div>
@endsection
