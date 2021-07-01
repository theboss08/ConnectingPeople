<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatMessage;
use App\Models\Friends;
use Illuminate\Support\Facades\Auth;
use App\Events\NewChatMessage;

class ChatController extends Controller
{
    public function show(Request $request, $user_id_2){
        Friends::where('user_id_1', min(Auth::user()->id, $user_id_2))->where('user_id_2', max(Auth::user()->id, $user_id_2))->firstOrFail();
        return view('chat', ['user_id_2' => $user_id_2]);
    }
    public function messages(Request $request, $user_id_2){
        return ChatMessage::where('user_id_1', min(Auth::user()->id, $user_id_2))->where('user_id_2', max(Auth::user()->id, $user_id_2))->get();
    }
    public function newMessage(Request $request, $user_id_2){
        $newMessage = ChatMessage::create([
            'user_id_1' => min(Auth::user()->id, $user_id_2),
            'user_id_2' => max(Auth::user()->id, $user_id_2),
            'message' => $request->message,
            'sent_by' => Auth::user()->username,
        ]);

        broadcast(new NewChatMessage($newMessage))->toOthers();

        return ['status' => 'success'];
    }
}
