<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class SearchController extends Controller
{
	public function index(Request $request){
		$users = User::where('username', 'like', '%'.$request->query('name').'%')->get();
		return view('search_result', ['users' => $users]);
	}
}
