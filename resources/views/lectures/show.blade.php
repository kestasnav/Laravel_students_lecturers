@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div> Paskaita: {{ $lecture->name }} </div>
                        <div class="d-flex">
                            @can('create', \App\Models\File::class)
                            <form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 d-flex">
                                    <label for="" class="form-label mx-2"></label>
                                    <input type="hidden" name="lecture_id" value="{{$lecture->id}}">
                                    <input type="file" class="form-control mx-2" name="file">
                                    <input type="text" class="form-control mx-2" name="name" placeholder="Failo pavadinimas">
                                    <div>
                                        <button class="btn btn-success">Add</button>
                                    </div>
                                </div>
                            </form>
                                @endcan
                        </div>

                        <div> <a class="btn btn-primary float-end mx-2"
                                 href="{{ route('group.lectures', $lecture->id) }}">Paskaitų sąrašas</a></div>

                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Failas</th>
                            <th>Failo pavadinimas</th>
                            <th></th>
                            <th></th>


                        </tr>
                        </thead>
                        <tbody>

                        <tr>

                                                          @foreach($files as $file)
                                                          @if ($file->lecture_id == $lecture->id)

                                                                      @can('view', $file)
                                                                  <td>{{ $file->file}}</td>

                                                                        <td>{{$file->name}}</td>


                                                                  @can('update', $file)
                                                                      <td>
                                                                      <form action="{{ route('files.destroy', $file->id) }}" method="post">
                                                                          @csrf
                                                                          @method('DELETE')
                                                                          <button class="btn btn-danger">Ištrinti</button>
                                                                      </form>
                                                                      </td>

                                            <td>
                                                                      @if($file->hide=='0')
                                                                      <form action="{{ route('hide', $file->id) }}" method="post">
                                                                          @csrf
                                                                          @method('PUT')
                                                                          <input type="hidden" name="hide" value="1">
                                                                          <button class="btn btn-warning">Paslėpti nuo studentų</button>
                                                                      </form>

                                                                      @else
                                                                      <form action="{{ route('unhide', $file->id) }}" method="post">
                                                                          @csrf
                                                                          @method('PUT')
                                                                          <input type="hidden" name="hide" value="0">
                                                                          <button class="btn btn-success">Rodyti studentams</button>
                                                                      </form>


                                                                      @endcan
                                                                      @endif
                                            </td>
                                            <td>

                                                <form action="{{ route('download', $file->file) }}" method="get">
                                                    @csrf
                                                    @method('DOWNLOAD')
                                                    <button class="btn btn-success">Atsisiųsti</button>
                                                </form>

                                            </td>
                                                                      @endcan
                                                          @endif



                        </tr>
                                                      @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection
