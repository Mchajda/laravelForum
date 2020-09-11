<?php

namespace App\Http\Controllers;

use App\Post;
use App\Room;
use App\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($id){
        $user = User::findOrFail(auth()->user()->id);
        $room = Room::find($id);


         return view('posts.create', [
            'user' => $user,
            'room' => $room,
        ]);
    }

    public function store(){
        $data = request()->validate([
            'title' => 'required',
            'author' => 'required',
            'content' => 'required',
            'parent_id' => 'required',
            'room_id' => 'required',
            'user_id' => 'required',
        ]);

        auth()->user()->posts()->create($data);

        if($data['parent_id'] == 0){
            return redirect('/room/'.$data['room_id']);
        }else{
            return redirect('/posts/'.$data['parent_id']);
        }
    }

    public function show($id){
        $post = Post::find($id);
        $user = User::findOrFail(auth()->user()->id);
        $comments = Post::where('parent_id', $id)->get();

        return view('posts.show', [
            'post' => $post,
            'user' => $user,
            'comments' => $comments,
        ]);
    }

    public function delete($id){
        $post = Post::where('id', $id)->delete();
        $comments = Post::where('parent_id', $id)->delete();

        return redirect('/home');
    }
}
