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
                            @if (Auth::user()->type=='destytojas')
                            <th>{{__('Studentų skaičius')}}</th>
                            @endif
                            <th>{{__('Pradžia')}}</th>
                            <th>{{__('Pabaiga')}}</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($groups as $group)



                        <tr>
                                <td>{{ $group->name }}</td>
                                    <td>{{ $group->course->name }}</td>
                                <td>{{ $group->students->count() }}</td>
                                <td>{{ $group->start }}</td>
                                <td>{{ $group->end }}</td>

                                @can('update', $group)
                                    <td><a class="btn btn-success" href="{{ route('groups.edit', $group->id) }}">{{__('Atnaujinti')}}</a></td>
                                @endcan

                                <td><a class="btn btn-warning" href="{{ route('group.lectures',$group->id) }}">{{__('Grupės paskaitos')}}</a></td>

                                    <td><a class="btn btn-info" href="{{ route('studentai', $group->id ) }}">{{__('Grupės studentai')}}</a></td>

                            <td>
                                @can('delete', $group)
                                    <form action="{{ route('groups.destroy', $group->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">{{__('Ištrinti')}}</button>
                                    </form>
                                @endcan
                            </td>
                            </tr>

                        @endforeach
                        @foreach($groupsSt as $group)
                            @foreach($gr as $g)
                                @if($group->group_id == $g->id)
                            <tr>
                                <td>{{ $g->name}}</td>
                                <td>{{ $g->course->name }}</td>
{{--                                <td>{{ $group->students->count() }}</td>--}}
                                <td>{{ $g->start }}</td>
                                <td>{{ $g->end }}</td>
                                <td><a class="btn btn-warning" href="{{ route('group.lectures',$g->id) }}">{{__('Paskaitos')}}</a></td>

                            </tr>
                            @endif
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

