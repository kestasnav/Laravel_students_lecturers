<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    use HasFactory;

    public function sender() {
        return $this->hasMany(User::class, 'id','sender_id');
    }

    public function receiver() {
        return $this->hasMany(User::class, 'id','receiver_id');
    }

    public static function messagesCount()
    {
        $messages = Message::all()->where('receiver_id',Auth::user()->id);



        $count=0;
        foreach ($messages as $message) {
            if($message->read_or_not == 0) {
                $count++;
            }
        }

        return $count;
    }

}

