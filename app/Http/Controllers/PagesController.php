<?php

namespace App\Http\Controllers;

use App\Post;
use App\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        //$posts = Post::all();
        $rooms = Room::all();
        //$posts = DB::table('posts')->orderBy('created_at', 'desc')->get();

        return view('home', [
            'user' => $user,
            'rooms' => $rooms,
        ]);
    }
}
