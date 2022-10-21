@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header"> Žinutė

                </div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                        <tr>
                            <h3>{{ $message->message }}</h3>
                        </tr>
                        </thead>
                    </table>

                </div>
                    <div class="card-footer">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Siuntėjas</th>
                                <th>El. Paštas</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                <td>@foreach($message->sender as $sender)
                                        <b> {{$sender->name}} {{$sender->surname}} </b>
                                <td>{{$sender->email}}</td>
                                @endforeach
                                </td>

                            </tr>
                            </tbody>

                        </table>
                        <a class="btn btn-success mx-3 float-end" href="{{ route('messages.index') }}">Go Back</a>
                    </div>
                    </div>

@endsection
