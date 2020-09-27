<?php

namespace App\Http\Controllers;

use App\Post;
use App\Profile;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $posts = Post::all();
        $users = User::all();
        //$profiles = Profile::all();

        return view('profiles.admin', [
            'posts' => $posts,
            'users' => $users,
            //'profiles' => $profiles,
        ]);
    }

    public function ban($id){

        $profile = Profile::find($id);
        $profile->user_status = "banned";
        $profile->save();

        return redirect('/admin');
    }

    public function unBan($id){

        $profile = Profile::find($id);
        $profile->user_status = "user";
        $profile->save();

        return redirect('/admin');
    }

    public function upUser($id){

        $profile = Profile::find($id);
        $profile->user_status = "admin";
        $profile->save();

        return redirect('/admin');
    }

    public function downUser($id){

        $profile = Profile::find($id);
        $profile->user_status = "user";
        $profile->save();

        return redirect('/admin');
    }
}
