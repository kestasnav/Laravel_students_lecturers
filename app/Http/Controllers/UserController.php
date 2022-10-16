<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=User::all()->where('type','==','studentas');
       // dd($students);
        return view("students.index",['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups=Group::all();

        return view("students.create",['groups'=>$groups]);
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
            'surname' => 'required',
            'password' => 'required',
            'email' => 'required|unique:users',
            'group_id' => 'required',
        ]);

        $student = new User();
        $student->name=$request->name;
        $student->surname=$request->surname;
        $student->email=$request->email;
        $student->password=Hash::make($request['password']);
        $student->save();
        $lastStudentID = $student->id;
        $studentGroup = new GroupUser();

        $studentGroup->user_id=$lastStudentID;
        $studentGroup->group_id=$request->group_id;

        $studentGroup->save();
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $student)
    {
        $groups=Group::all();

        return view("students.update",['student'=>$student,'groups'=>$groups]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $student)
    {
        $studentGroup = new GroupUser();
        $studentGroup->user_id=$student->id;
        $studentGroup->group_id=$request->group_id;

        $studentGroup->save();
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function redagavimas (User $student){

        return view('students.redagavimas',['student'=>$student]);
    }

    public function profilioredagavimas (Request $request){

        $student=User::find(Auth::user()->id);
        $student->name=$request->name;
        $student->surname=$request->surname;

        $student->email = $request->email;

        $student->phone=$request->phone;
        if($request->password == null) {
            $student->password = $request->hiddenpassword;
        } else {
            $student->password = Hash::make($request['password']);
        }
        $student->save();

        return redirect()->back();
    }

}
