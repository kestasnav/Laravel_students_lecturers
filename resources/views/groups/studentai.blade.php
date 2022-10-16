@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header">Grupės studentų sąrašas </div>


                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Vardas</th>
                            <th>Pavardė</th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($students as $student)
                            @foreach($users as $user)
                                @if($student->user_id == $user->id)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->surname }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach

                        </tbody>
                    </table>
                    <a class="btn btn-success mx-3 float-end" href="{{ route('groups.index') }}">Go Back</a>

                </div>
            </div>
        </div>

    </div>
@endsection

