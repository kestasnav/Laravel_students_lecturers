@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Create form</div>
                <div class="card-body">
                    <form action="{{ route('students.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Vardas</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')}}">
                            @error('name')
                            @foreach( $errors->get('name') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pavardė</label>
                            <input class="form-control @error('surname') is-invalid @enderror" type="text" name="surname" value="{{old('surname')}}">
                            @error('surname')
                            @foreach( $errors->get('surname') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">El. Paštas</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{old('email')}}">
                            @error('email')
                            @foreach( $errors->get('email') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Slaptažodis</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="text" name="password" value="{{old('password')}}">
                            @error('password')
                            @foreach( $errors->get('password') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Grupė</label>
                            <select class="form-control @error('group_id') is-invalid @enderror" name="group_id" >
                                <option selected>Pasirinkti</option>
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}" @selected(old('group_id')==$group->id) )> {{$group->name}} </option>
                                @endforeach
                            </select>
                            @error('group_id')
                            @foreach( $errors->get('group_id') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>

                        <button class="btn btn-primary">Add</button>
                        <a class="btn btn-success mx-3 float-end" href="{{ route('students.index') }}">Go Back</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
