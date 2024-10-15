<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    public function index()
    {
        return view('message');
    }


    public function create(Request $request)
    {
        // return view('me')
    }
    public function store(Request $request)
    {

        $user = Auth::user();
        $reqUrl = explode('/', $request->url);
        $keyPoint = Str::afterLast($request->url, '/');
        if ($reqUrl[3] == 'channel-chat') {
            $message = Message::create([
                'content' => $request->content,
                'user_id' =>  $user->id,
                'sender_id' => $user->id,
                // 'keyPoint' => $keyPoint,
                'receiver_id' => ' ',
                'is_admin' => false,
                'isGroupChat' => true
            ]);
            MessageSent::dispatch($message);
            return redirect()->back();
        }


        $receiver_id = $request->receiver_id ?? '11';

        if ($request->receiver_id) {
        }
        if (!$request->receiver_id) {
        }
        $message = Message::create([
            'content' => $request->content,
            'user_id' =>  $user->id,
            'sender_id' => $user->id,
            // 'keyPoint' => $keyPoint,
            'receiver_id' => $receiver_id,
            'is_admin' => false,
            'isGroupChat' => true
        ]);
        MessageSent::dispatch($message);
        return redirect()->back();
    }
}
