@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">{{Auth::user()->name}} {{Auth::user()->surname}}</div>
                <div class="card-body">
                    @can('create', \App\Models\Group::class)
                        <a class="btn btn-primary float-end " href="{{ route('groups.create') }}">{{__('Pridėti naują grupę')}}</a>
                    @endcan
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{__('Grupės pavadinimas')}}</th>
                            <th>{{__('Kursų pavadinimas')}}</th>
{{--                            <th>{{__('Studentų skaičius')}}</th>--}}
                            <th>{{__('Pradžia')}}</th>
                            <th>{{__('Pabaiga')}}</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($groups as $group)
                            @can('viewAny', $group)
                            <tr>

                                <td>{{ $group->name }}</td>
                                    <td>{{ $group->course->name }}</td>
{{--                                <td>{{ $students->id }}</td>--}}
                                <td>{{ $group->start }}</td>
                                <td>{{ $group->end }}</td>

                                @can('update', $group)
                                    <td><a class="btn btn-success" href="{{ route('groups.edit', $group->id) }}">{{__('Atnaujinti')}}</a></td>
                                @endcan

                                <td><a class="btn btn-success" href="{{ route('group.lectures', $group->id) }}">{{__('Paskaitos')}}</a></td>

                                    <td><a class="btn btn-success" href="{{ route('students.groups', $group->id ) }}">{{__('Studentai')}}</a></td>


                            </tr>

                            @endcan
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

