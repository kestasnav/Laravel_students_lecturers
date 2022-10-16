@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header"> Paskaitos </div>

                <div class="card-body">
                    <a class="btn btn-primary float-end" href="{{ route('lectures.create') }}">Pridėti naują paskaitą</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Paskaitos pavadinimas</th>
                            <th>Paskaitos aprašymas</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            @foreach($lectures as $lecture)

                                <td>{{ $lecture->name }}</td>
                                <td>{{ $lecture->description }}</td>
                                <td><a class="btn btn-success" href="{{ route('lectures.edit', $lecture->id) }}">Atnaujinti</a></td>

                        <td><a class="btn btn-warning" href="{{ route('lectures.show', $lecture->id) }}">Paskaitos failai</a></td>
                                <td>

                                        <form action="{{ route('lectures.destroy', $lecture->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">{{__('Ištrinti')}}</button>
                                        </form>

                                </td>
                        </tr>

                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection
