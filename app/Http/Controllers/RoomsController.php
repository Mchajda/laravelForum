<?php

namespace App\Http\Controllers;

use App\Post;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id){
        $room = Room::find($id);
        $posts = DB::table('posts')->orderBy('created_at', 'desc')->get();

        return view('rooms.room', [
            'room' => $room,
            'posts' => $posts,
        ]);
    }

    public function create(){
        $rooms = Room::all();

        return view('rooms.create', [
            'rooms' => $rooms,
        ]);
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required',
            'parent' => 'required',
            //'description' => 'required',
        ]);

        $new_room = new Room();
        $new_room->name = $data['name'];
        //$new_room->description = "";

        if($data['parent'] == "Brak"){
            $new_room->parent_id = 0;
        }else{
            $parent_room = Room::where('name', $data['parent'])->get();
            $new_room->parent_id = $parent_room->first()->id;
        }

        $new_room->save();
        return redirect('/home');
    }
}
