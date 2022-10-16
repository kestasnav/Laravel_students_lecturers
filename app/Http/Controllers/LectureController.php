<?php

namespace App\Http\Controllers;


use App\Models\File;
use App\Models\Group;
use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paskaitos( $name)
    {
        // $lectures=Lecture::with('group')->get();

        $lectures = Lecture::with('group')->where('group_id', $name)->get();

        return view("lectures.grupespaskaitos",['lectures'=>$lectures]);
    }

    public function index()
    {
        $lectures = Lecture::with('group')->get();
        return view("lectures.index",['lectures'=>$lectures]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups=Group::all();
        return view("lectures.create",['groups'=>$groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ],
            [
                'name.required' => 'Paskaitos pavadinimas privalomas',

            ]);
        $lecture = new Lecture();
        $lecture->name=$request->name;
        $lecture->description=$request->description;
        $lecture->group_id=$request->group_id;
        $lecture->date=$request->date;

        $lecture->save();
        return redirect()->route('lectures.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function show(Lecture $lecture)
    {
        $files=File::all();

        return view("lectures.show",['files'=>$files, 'lecture'=>$lecture]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture)
    {
        $groups=Group::all();
        return view("lectures.update",['lecture'=>$lecture, 'groups'=>$groups]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecture $lecture)
    {
        $lecture->name=$request->name;
        $lecture->description=$request->description;
        $lecture->group_id=$request->group_id;
        $lecture->date=$request->date;

        $lecture->save();
        return redirect()->route('lectures.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {
        $lecture->delete();
        return redirect()->back();
    }
}
