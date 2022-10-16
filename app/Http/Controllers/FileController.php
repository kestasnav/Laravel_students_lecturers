<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paskaitosFailas = new File();

        $failas=$request->file('file');

        $filename=$request->lecture_id.'_'.rand().'.'.$failas->extension();

        $paskaitosFailas->file=$filename;
        $paskaitosFailas->lecture_id=$request->lecture_id;
        $paskaitosFailas->name=$request->name;

        $failas->storeAs('paskaitosFailai',$filename);
        $paskaitosFailas->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        $files=File::all();
        return view('files.show', ['files'=>$files]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        unlink( storage_path('/app/paskaitosFailai/'.$file->file));
        $file->delete();
        return redirect()->back();
    }

    public function display($name,Request $request){
        $file=storage_path('app/paskaitosFailai/'.$name);
        return response()->file( $file );
    }

    public  function hide(File $file, Request $request, $add)
    {
        $file=File::find($add);
        $file->hide=$request->hide;
        $file->save();
        return redirect()->back();
    }
    public  function unhide(File $file, Request $request, $remove)
    {
        $file=File::find($remove);
        $file->hide=$request->hide;
        $file->save();
        return redirect()->back();
    }

    public  function download( $id)
    {
        $failas= storage_path('/app/paskaitosFailai/'.$id);
        return response()->download( $failas);

    }

}
