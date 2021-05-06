<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FriendRequestNotification;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class NotificationController extends Controller
{
    public function store(Request $request) {
        FriendRequestNotification::create([
            'sent_by' => $request->sent_by,
            'sent_to' => $request->sent_to,
        ]);
        return response()->json([
            'message' => 'success',
            'body' => 'friend request sent',
        ]);
    }

    public function index(Request $request) {
        $userId = Auth::user()->id;
        $requests = FriendRequestNotification::where('sent_to', $userId)->get();
        $users = [];
        foreach($requests as $request){
            $user = User::find($request->sent_by);
            array_push($users, $user);
        }
        return view('notification', ['users' => $users]);
    }
}
