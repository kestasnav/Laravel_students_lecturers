@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Update form</div>
                <div class="card-body">
                    <form action="{{ route('profilioredagavimas', Auth::user()->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Vardas</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{Auth::user()->name}}">
                            @error('name')
                            @foreach( $errors->get('name') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pavardė</label>
                            <input class="form-control @error('surname') is-invalid @enderror" type="text" name="surname" value="{{Auth::user()->surname}}">
                            @error('surname')
                            @foreach( $errors->get('surname') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">El. Paštas</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{Auth::user()->email}}">
                            @error('email')
                            @foreach( $errors->get('email') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telefonas</label>
                            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{Auth::user()->phone}}">
                            @error('phone')
                            @foreach( $errors->get('phone') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Slaptažodis</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="text" name="password">
                            <input class="form-control @error('password') is-invalid @enderror" type="hidden" name="hiddenpassword" value="{{Auth::user()->password}}">

                            @error('password')
                            @foreach( $errors->get('password') as $error)
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
