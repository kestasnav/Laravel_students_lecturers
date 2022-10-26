<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $messages = Message::all()->where('receiver_id', Auth::user()->id)->sortDesc();

        $senderMsg = Message::all()->where('sender_id', Auth::user()->id)->sortDesc();
            $count=0;
        foreach ($messages as $message) {
            if ($message->read_or_not == 0) {
                $count++;
         }
        }

        return view("messages.index",['messages'=>$messages, 'senderMsg'=>$senderMsg, 'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $receivers=User::with('receiver')->get();

        return view("messages.create",['receivers'=>$receivers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new Message();
        $message->title=$request->title;
        $message->message=$request->message;
        $message->sender_id=$request->sender_id;
        $message->receiver_id=$request->receiver_id;

        $message->save();
        return redirect()->route('messages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        $messages = Message::all()->where('receiver_id',Auth::user()->id);
        $senderMsg = Message::all()->where('sender_id',Auth::user()->id);
        return view("messages.show",['message'=>$message, 'messages'=>$messages,'senderMsg'=>$senderMsg]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->back();
    }

    public  function read(Message $message, Request $request, $read)
    {
        $message=Message::find($read);
        $message->read_or_not=$request->read;
        $message->save();
       return redirect()->route('messages.show', $message->id);
    }

    public  function layout()
    {
        $messages = Message::all()->where('receiver_id',Auth::user()->id);



        $count=0;
        foreach ($messages as $message) {
            if($message->read_or_not == 0) {
               $count++;
            }
        }

        return view("layouts.app",['messages'=>$messages, 'count'=>$count]);
    }
}
