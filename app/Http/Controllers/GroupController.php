<?php

namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\Group;

use App\Models\GroupUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups=Group::with(['lecturer','students','course'])->where('lecturer_id', Auth::user()->id)->get();
        //$studentas= User::where('id', Auth::user()->id)->get();

        $groupsSt=GroupUser::with(['groups'])->where('user_id', Auth::user()->id)->get();
        $gr=Group::all();
       //dd($groupsSt);

        return view("groups.index",['groups'=>$groups, 'groupsSt'=>$groupsSt, 'gr'=>$gr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::with('group')->get();
       // $lecturers=User::with('group')->where('id','lecturer_id')->get();
        $lecturers=User::all()->where('type', '==', 'destytojas');
        return view('groups.create', ['courses'=>$courses, 'lecturers'=>$lecturers]);
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
                'name.required' => 'Kursų pavadinimas privalomas',

            ]);
        $group = new Group();
        $group->name=$request->name;
        $group->course_id=$request->course_id;
        $group->start=$request->start;
        $group->end=$request->end;
        $group->lecturer_id=$request->lecturer_id;

        $group->save();
        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $courses=Course::with('group')->get();
        // $lecturers=User::with('group')->where('id','lecturer_id')->get();
        $lecturers=User::all()->where('type', '==', 'destytojas');
        return view('groups.update', ['group'=>$group, 'courses'=>$courses, 'lecturers'=>$lecturers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $group->name=$request->name;
        $group->course_id=$request->course_id;
        $group->start=$request->start;
        $group->end=$request->end;
        $group->lecturer_id=$request->lecturer_id;

        $group->save();
        return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->back();
    }

    public function studentai ($name){
        //=Group::find($name);
        $students=GroupUser::where('group_id', $name)->get();
        //dd($students);
        $users=User::all();
        return view('groups.studentai',['students'=>$students,'users'=>$users]);
    }

}
