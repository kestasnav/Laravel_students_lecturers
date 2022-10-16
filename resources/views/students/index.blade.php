@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header">Studentai </div>


                <div class="card-body">
{{--                    @can('create', \App\Models\Group::class)--}}
                        <a class="btn btn-primary float-end " href="{{ route('students.create') }}">{{__('Pridėti naują studentą')}}</a>
{{--                    @endcan--}}
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Vardas</th>
                            <th>Pavardė</th>
                            <th>El. Paštas</th>
                            <th>Telefonas</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            @foreach($students as $student)

                                <td>{{ $student->name }}</td>
                                <td>{{ $student->surname }}</td>
                                <td>{{ $student->email }}</td>
                                <td>
                                    @if( $student->phone == true )
                                        {{ $student->phone }}
                                        @else
                                        {{ 'Telefonas nežinomas' }}
                                        @endif
                                </td>
{{--                                @can('update', $group)--}}
                                    <td><a class="btn btn-success" href="{{ route('students.edit', $student->id) }}">{{__('Priskirti grupę')}}</a></td>
{{--                                @endcan--}}
                        </tr>


                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection


