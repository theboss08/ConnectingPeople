<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TextPostLikes;
use App\Models\TextPostDislikes;
use App\Models\ImagePostLikes;
use App\Models\ImagePostDislikes;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
	public function index(Request $request, $type){
		if($type === 'text'){
			if(isset($request->like)){
				if($request->like === true){
					TextPostLikes::create([
						'user_id' => Auth::user()->id,
						'text_post_id' => $request->post_id,
					]);
				}
				else {
					TextPostLikes::where('user_id', Auth::user()->id)->where('text_post_id', $request->post_id)->delete();
				}
			}
			if(isset($request->dislike)){
				if($request->dislike === true){
					TextPostDislikes::create([
						'user_id' => Auth::user()->id,
						'text_post_id' => $request->post_id,
					]);
				}
				else {
					TextPostDislikes::where('user_id', Auth::user()->id)->where('text_post_id', $request->post_id)->delete();
				}
			}
			return response()->json(['message' => 'success']);
		}
		else {
			if(isset($request->like)){
				if($request->like === true){
					ImagePostLikes::create([
						'user_id' => Auth::user()->id,
						'image_post_id' => $request->post_id,
					]);
				}
				else {
					ImagePostLikes::where('user_id', Auth::user()->id)->where('image_post_id', $request->post_id)->delete();
				}
			}
			if(isset($request->dislike)){
				if($request->dislike === true){
					ImagePostDislikes::create([
						'user_id' => Auth::user()->id,
						'image_post_id' => $request->post_id,
					]);
				}
				else {
					ImagePostDislikes::where('user_id', Auth::user()->id)->where('image_post_id', $request->post_id)->delete();
				}
			}
			return response()->json(['message' => 'success']);
		}
	}
}
