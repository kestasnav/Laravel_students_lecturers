@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header"> Kursai </div>


                <div class="card-body">
                    @can('create', \App\Models\Course::class)
                    <a class="btn btn-primary float-end " href="{{ route('courses.create') }}">{{__('Pridėti naują kursą')}}</a>
                    @endcan
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Kursų pavadinimas</th>
                            <th>Kursui priklausančios grupės</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            @foreach($courses as $course)

                                <td>{{ $course->name }}</td>
                                <td>
                                    @foreach( $course->group as $group)
                                        [ {{$group->name}} ]
                                    @endforeach
                                </td>
                                @can('update', $course)
                                    <td><a class="btn btn-success" href="{{ route('courses.edit', $course->id) }}">{{__('Atnaujinti')}}</a></td>
                                @endcan

                                <td>
                                    @can('delete', $course)
                                        <form action="{{ route('courses.destroy', $course->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">{{__('Ištrinti')}}</button>
                                        </form>
                                    @endcan
                                </td>
                        </tr>


                        @endforeach

                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </div>
@endsection

