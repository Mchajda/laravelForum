@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron p-4">
                <form action="/room/create" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Room name:</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="parent">Parent name:</label>
                        <select name="parent" class="form-control">
                            <option>Brak</option>
                            @foreach($rooms as $room)
                                @if($room->parent_id == 0)
                                    <option>{{ $room->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">dodaj pokoj</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

