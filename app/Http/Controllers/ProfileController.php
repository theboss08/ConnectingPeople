<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use App\Models\Friends;

class ProfileController extends Controller
{
    public function index(Request $request) {
        $user = Auth::user();
        $friends = [];
        $temp1 = Friends::where('user_id_1', Auth::user()->id)->get();
        $temp2 = Friends::where('user_id_2', Auth::user()->id)->get();
        foreach($temp1 as $temp){
            $usert = User::find($temp->user_id_2);
            array_push($friends, $usert);
        }
        foreach($temp2 as $temp){
            $usert = User::find($temp->user_id_1);
            array_push($friends, $usert);
        }
        return view('dashboard', ['user' => $user, 'friends' => $friends]);
    }

    public function edit(Request $request){
        $user = Auth::user();
        return view('profile_edit', ['user' => $user]);
    }

    public function update(Request $request){
        $user = Auth::user();
        $data = $request->validate([
            'bio' => 'required',
            'photo_url' => '',
            'education' => '',
            'current_address' => '',
            'from_address' => '',
            'workplace' => '',
            'relationship' => '',
            'hobbies' => '',
        ]);
        $user->profile->update($data);
        return redirect('/dashboard');
    }

    public function show(Request $request, $id){
        $user = User::findOrFail($id);
        return view('profile', ['user' => $user]);
    }
}
