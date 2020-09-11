@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="display-4">{{ $room->name }}</h2>
                    <a href="/home" class="btn btn-warning">Wróć</a>
                </div>

                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                    <hr class="my-3">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <p class="lead">
                    <a href="/create/{{$room->id}}">utworz post w pokoju {{ $room->name }}</a>
                </p>
            </div>

            @foreach($posts as $post)
                @if($post->room_id == $room->id)
                    @if($post->parent_id == 0)
                        <div class="card mb-4">
                            <a href="/posts/{{ $post->id }}" style="color: inherit;"><div class="card-header"><h4 style="margin: 0px;">{{ $post->title }}</h4></div></a>
                            <div class="card-body">{!! $post->content !!}</div>
                            <div class="card-footer"><small>{{ $post->author }} | {{ $post->created_at }}</small></div>
                        </div>
                    @endif
                @endif
            @endforeach

        </div>
    </div>
</div>
@endsection

