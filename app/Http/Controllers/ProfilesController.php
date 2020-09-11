<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $posts = Post::where('user_id', $user_id)->where('parent_id', 0)->get();

        return view('profiles.yourprofile', [
            'user' => $user,
            'user_posts' => $posts,
        ]);
    }
}
