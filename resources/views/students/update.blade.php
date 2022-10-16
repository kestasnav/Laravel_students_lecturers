@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Priskirti grupę studentui: {{$student->name}} {{$student->surname}}</div>
                <div class="card-body">
                    <form action="{{ route('students.update', $student->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">Grupė</label>
                            <select class="form-control" name="group_id" >
                                <option selected>Pasirinkti</option>
                                @foreach($groups as $group)
                                    <option value="{{$group->id}}" > {{$group->name}} </option>
                                @endforeach
                            </select>

                        </div>

                        <button class="btn btn-primary">Add</button>
                        <a class="btn btn-success mx-3 float-end" href="{{ route('students.index') }}">Go Back</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
