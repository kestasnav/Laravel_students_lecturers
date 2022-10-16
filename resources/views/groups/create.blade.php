@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Create form</div>
                <div class="card-body">
                    <form action="{{ route('groups.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Grupės pavadinimas</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')}}">
                            @error('name')
                            @foreach( $errors->get('name') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Kursas</label>
                            <select class="form-control @error('course_id') is-invalid @enderror" name="course_id" >
                                <option selected>Pasirinkti</option>
                                @foreach($courses as $course)
                                    <option value="{{$course->id}}" @selected(old('course_id')==$course->id) )> {{$course->name}} </option>
                                @endforeach
                            </select>
                            @error('course_id')
                            @foreach( $errors->get('course_id') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Grupės mokslų pradžia</label>
                            <input class="form-control @error('start') is-invalid @enderror" type="date" name="start" value="{{old('start')}}">
                            @error('start')
                            @foreach( $errors->get('start') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Grupės mokslų pabaiga</label>
                            <input class="form-control @error('end') is-invalid @enderror" type="date" name="end" value="{{old('end')}}">
                            @error('end')
                            @foreach( $errors->get('end') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Dėstytojas</label>
                            <select class="form-control @error('lecturer_id') is-invalid @enderror" name="lecturer_id" >
                                <option selected>Pasirinkti</option>

                                @foreach($lecturers as $lecturer)
                                    <option value="{{$lecturer->id}}" @selected(old('lecturer_id')==$lecturer->id) )> {{$lecturer->name}} </option>
                                @endforeach
                            </select>
                            @error('lecturer_id')
                            @foreach( $errors->get('lecturer_id') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>

                        <button class="btn btn-primary">Add</button>
                        <a class="btn btn-success mx-3 float-end" href="{{ route('groups.index') }}">Go Back</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

