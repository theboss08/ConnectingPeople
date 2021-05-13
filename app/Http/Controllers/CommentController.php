<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TextComment;
use App\Models\ImageComment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $type){
        if($type === 'text'){
            TextComment::create([
                'user_id' => Auth::user()->id,
                'text_post_id' => $request->post_id,
                'body' => $request->body,
            ]);
            return redirect('/text/' . $request->post_id)->with('status', "Your comment was added");
        }
        else if($type === 'image'){
            ImageComment::create([
                'user_id' => Auth::user()->id,
                'image_post_id' => $request->post_id,
                'body' => $request->body,
            ]);
            return redirect('/image/' . $request->post_id)->with('status', "Your comment was added");
        }
    }
}
