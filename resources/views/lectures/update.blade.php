@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Update form</div>
                <div class="card-body">
                    <form action="{{ route('lectures.update',$lecture->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Pavadinimas</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{$lecture->name}}">
                            @error('name')
                            @foreach( $errors->get('name') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Aprašymas</label>
                            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" value="{{$lecture->description}}">
                            @error('description')
                            @foreach( $errors->get('description') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Data</label>
                            <input class="form-control @error('date') is-invalid @enderror" type="date" name="date" value="{{$lecture->date}}">
                            @error('date')
                            @foreach( $errors->get('date') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Grupė</label>
                            <select class="form-control @error('group_id') is-invalid @enderror" name="group_id" >
                                <option selected>Pasirinkti</option>
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}" @selected($lecture->group_id==$group->id) )> {{$group->name}} </option>
                                @endforeach
                            </select>
                            @error('course_id')
                            @foreach( $errors->get('course_id') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>

                        <button class="btn btn-primary">Add</button>
                        <a class="btn btn-success mx-3 float-end" href="{{ route('lectures.index') }}">Go Back</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
