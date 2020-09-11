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

    public function index($id){
        //$user_id = auth()->user()->id;
        $user = User::find($id);
        $posts = Post::where('user_id', $id)->where('parent_id', 0)->get();

        return view('profiles.profile', [
            'user' => $user,
            'user_posts' => $posts,
        ]);
    }
}
