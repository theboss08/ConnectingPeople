<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TextPost;
use App\Models\ImagePost;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function create(Request $request, $type){
        if($type === 'text'){
            $request->validate([
                'caption' => 'required|string|max:255',
                'post_text' => 'required|string|max:10000',
            ]);
            $post = TextPost::create([
                'caption' => $request->caption,
                'post_body' => $request->post_text,
                'user_id' => Auth::user()->id,
            ]);
        }
        else if($type === 'image'){
            $request->validate([
                'caption' => 'required|string|max:255',
                'image' => 'required|image',
            ]);
            $path = request('image')->store('posts/image', 'public');

            $image = Image::make(public_path("storage/{$path}"))->fit(1200, 1200);
            $image->save();

            ImagePost::create([
                'user_id' => Auth::user()->id,
                'caption' => $request->caption,
                'image_url' => $path,
            ]);
        }
        else if($type === 'video'){
            $request->validate([
                'caption' => 'required|string|max:255',
                'video' => 'required',
            ]);
            dd(request('video')->store('/posts/video', 'public'));
        }
        return redirect('/')->with('status', "Your post was added");
    }
}
