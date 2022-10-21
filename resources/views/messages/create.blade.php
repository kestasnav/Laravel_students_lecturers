@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Create form</div>
                <div class="card-body">
                    <form action="{{ route('messages.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Žinutės antraštė</label>
                            <input class="form-control"  type="text" name="title">

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pilnas žinutės tekstas</label>
                            <input class="form-control"  type="text" name="message">

                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Gavėjas</label>
                            <select class="form-control" type="text" name="receiver_id" >
                                <option selected>Pasirinkti</option>

                                @foreach($receivers as $receiver)
                                    <option value="{{$receiver->id}}"> {{$receiver->name}} {{$receiver->surname}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="hidden" name="sender_id" value="{{Auth::user()->id}}">
                        </div>

                        <button class="btn btn-primary">Add</button>
                        <a class="btn btn-success mx-3 float-end" href="{{ route('messages.show', Auth::user()->id) }}">Go Back</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

