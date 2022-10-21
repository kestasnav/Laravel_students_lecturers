@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header"> Žinutės
                    <a class="btn btn-primary float-end" href="{{ route('messages.create') }}">Siųsti naują žinutę</a>
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Gautos žinutės</th>
                            <th>Siuntėjas</th>
                            <th>El. Paštas</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            @foreach($messages as $message)

                                <td>

                                    <form action="{{ route('read', $message->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="read" value="1">
                                        @if($message->read_or_not == 1)
                                        <button class="btn btn-light text-success">
                                          {{ $message->title }}  </button>
                                            @else
                                            <button class="btn btn-light text-danger">
                                                {{ $message->title. ' (Skaityti daugiau..)' }}  </button>
                                            @endif
                                        </button>
                                    </form>

                                </td>
                                <td>@foreach($message->sender as $sender)
                                        <b> {{$sender->name}} {{$sender->surname}} </b>
                                <td>{{$sender->email}}</td>
                                @endforeach
                                </td>
                                <td>
                                    <form action="{{ route('messages.destroy', $message->id) }}" method="post">
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



                <div class="card-footer">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Išsiųstos žinutės</th>
                            <th>Gavėjas</th>
                            <th>El. Paštas</th>
                            <th></th>
                            <th></th>


                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            @foreach($senderMsg as $msg)

                                <td>{{ $msg->title }}</td>
                                <td>@foreach($msg->receiver as $receiver)
                                        <b> {{$receiver->name}} {{$receiver->surname}} </b>
                                <td>{{$receiver->email}}</td>
                                @endforeach
                                </td>
                                @if($msg->read_or_not == 0)
                                    <td><h6 class="text-danger">Neperskaityta</h6></td>
                                @else
                                    <td><b class="text-success">Perskaityta</b></td>
                                @endif
                        </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
