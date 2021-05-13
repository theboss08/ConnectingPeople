<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TextPost;
use App\Models\ImagePost;
use App\Models\Friends;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function index(Request $request){
        $friends1 = Friends::where('user_id_1', Auth::user()->id)->get();
        $friends2 = Friends::where('user_id_2', Auth::user()->id)->get();
        $friends = [];
        foreach($friends1 as $fr){
            array_push($friends, User::find($fr->user_id_2));
        }
        foreach($friends2 as $fr){
            array_push($friends, User::find($fr->user_id_1));
        }
        $imagePosts = [];
        $textPosts = [];
        foreach($friends as $frs){
            foreach($frs->imagePost as $ip){
                array_push($imagePosts, $ip);
            }
        }
        foreach($friends as $frs){
            foreach($frs->textPost as $ip){
                array_push($textPosts, $ip);
            }
        }
        return view('welcome', ['imagePosts' => $imagePosts, 'textPosts' => $textPosts]);
    }

    public function show(Request $request, $type, $id){
        if($type === 'text'){
            $post = TextPost::findOrFail($id);
            return view('post.view_text', ['post' => $post]);
        }
        else if($type === 'image'){
            $post = ImagePost::findOrFail($id);
            return view('post.view_image', ['post' => $post]);
        }
    }

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
