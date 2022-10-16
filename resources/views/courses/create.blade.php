@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Create form</div>
                <div class="card-body">
                    <form action="{{ route('courses.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Kursų pavadinimas</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')}}">
                            @error('name')
                            @foreach( $errors->get('name') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>


                        <button class="btn btn-primary">Add</button>
                        <a class="btn btn-success mx-3 float-end" href="{{ route('courses.index') }}">Go Back</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
