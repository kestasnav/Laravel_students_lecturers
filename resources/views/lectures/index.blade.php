@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header"> Paskaitos </div>


                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Paskaitos pavadinimas</th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                    @foreach($lectures as $lecture)
                       @if($lecture->group_id == request()->route('name') )
                            <td>{{ $lecture->name }}</td>
                            <td></td>
                        </tr>

                        @endif
                        @endforeach

                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </div>
@endsection

