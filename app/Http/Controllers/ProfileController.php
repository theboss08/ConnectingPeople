<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request) {
        $user = Auth::user();
        return view('dashboard', ['user' => $user]);
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
}
