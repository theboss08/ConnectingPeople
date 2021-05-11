<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FriendRequestNotification;
use App\Models\Friends;

class FriendsController extends Controller
{
    public function accept(Request $request) {
    	FriendRequestNotification::where('sent_by', $request->user_id_1)->where('sent_to', $request->user_id_2)->delete();
    	FriendRequestNotification::where('sent_to', $request->user_id_1)->where('sent_by', $request->user_id_2)->delete();
    	$mins = min($request->user_id_1, $request->user_id_2);
    	$maxs = max($request->user_id_1, $request->user_id_2);
    	Friends::create([
    		'user_id_1' => $mins,
    		'user_id_2' => $maxs,
    	]);
    	return redirect()->route('notification');
    }

    public function reject(Request $request){
    	FriendRequestNotification::where('sent_by', $request->user_id_1)->where('sent_to', $request->user_id_2)->delete();
    	return redirect()->route('notification');
    }
}
