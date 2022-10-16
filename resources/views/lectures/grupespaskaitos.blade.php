@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header"> @foreach($lectures as $lecture) {{ $lecture->group->name }} @break @endforeach grupės paskaitos </div>


                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Paskaitos pavadinimas</th>
                            <th>Paskaitos aprašymas</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                    @foreach($lectures as $lecture)

                            <td>{{ $lecture->name }}</td>
                            <td>{{ $lecture->description }}</td>
                            <td><a class="btn btn-success" href="{{ route('lectures.show', $lecture->id) }}">Paskaitos failai</a></td>
                        </tr>


                        @endforeach

                        </tbody>
                    </table>
                    <a class="btn btn-success mx-3 float-end" href="{{ route('groups.index') }}">Go Back</a>

                </div>
            </div>
        </div>

    </div>
@endsection

