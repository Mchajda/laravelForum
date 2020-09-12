@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="card ">
                        <div class="card-header bg-dark text-light d-flex justify-content-between align-items-baseline"><h4 style="margin: 0px;">{{ $post->title }}</h4><a href="../room/{{$post->room_id}}" class="btn btn-warning">Wróć</a></div>
                        <div class="card-body">{!! $post->content !!}</div>
                        <div class="card-footer">
                            <small class="d-flex justify-content-between align-items-baseline">
                                <div><a href="/profile/{{ $post->user_id }}">{{ $post->author }}</a> | {{ $post->created_at }}</div>
                                @if($post->author == $user->name)
                                    <a href="/delete/{{ $post->id }}" class="btn btn-sm btn-danger">Usuń post</a>
                                @endif
                            </small>
                        </div>
                    </div>

                    <!-- comments -->
                    @if($comments->count() > 0)
                        @foreach($comments as $comment)
                            <div class="card  mt-4">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        {{ $comment->author }} | {{ $comment->created_at }}
                                        @if($comment->author == $user->name)
                                            <a href="/delete/{{ $comment->id }}" class="btn btn-sm btn-danger">Usuń komentarz</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-body">{{ $comment->content }}</div>
                            </div>
                        @endforeach
                    @endif

                </div>

                <div class="card-footer">
                    <form action="{{ route('savePost') }}" enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="content">Dodaj komentarz: </label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="content" name="content" placeholder="comment...">

                                <input type="hidden" name="title" value="none">

                                <input type="hidden" name="author" value="{{ $user->name }}">
                                <input type="hidden" name="parent_id" value="{{ $post->id }}">
                                <input type="hidden" name="room_id" value="{{ $post->room_id }}">
                                <input type="hidden" name="room_name" value="{{ $post->room_name }}">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Zapisz</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
