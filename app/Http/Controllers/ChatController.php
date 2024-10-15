<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function channelChat(Request $request, $id)
    {




        $messages = Message::where('sender_id', $id)->where('isGroupChat', true)->get();



        return view('groupchat', compact('messages', 'id'));
    }
    public function groupChat() {}
    public function privateChat($id)
    {
        $authUser =  Auth::user(); // 1 
        $talkingUser  = User::find($id);  // 2

        $messages =
            Message::query()->where(function ($query) use ($authUser, $talkingUser) {
                $query->where('sender_id', $authUser->id)->where('receiver_id', $talkingUser->id);
            })
            ->orwhere(function ($query) use ($authUser, $talkingUser) {
                // 2
                $query->where('receiver_id', $authUser->id)->where('sender_id', $talkingUser->id);
            })->get();



        return view('privatechat', compact('messages'));
    }
}
