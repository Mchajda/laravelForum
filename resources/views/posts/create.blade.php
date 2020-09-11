@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('savePost') }}" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="card-header d-flex justify-content-between align-items-baseline"><span>Napisz coś w pokoju <span style="font-weight: bold">{{ $room->name }}</span></span><div><button type="submit" class="btn btn-primary">Zapisz</button> <a href="../room/{{ $room->id }}" class="btn btn-warning">Wróć</a></div></div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title: </label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="title">
                        </div>
                        <div class="form-group">
                            <label for="content">Title: </label>
                            <textarea rows="3" class="form-control" id="content" name="content" placeholder="content"></textarea>

                            <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
                            <script>
                                window.onload=function () {
                                    CKEDITOR.replace( 'content' );
                                }
                            </script>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="author" value="{{ $user->name }}">
                            <input type="hidden" name="parent_id" value="0">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
