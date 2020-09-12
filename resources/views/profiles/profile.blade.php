@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if(auth()->user()->id == $user->id)
                        Twoje posty <span class="badge badge-dark">{{ $user_posts->count() }}</span>:
                    @else
                        Posty użytkownika {{ $user->name }} <span class="badge badge-dark">{{ $user_posts->count() }}</span>:
                    @endif
                </div>
                <div class="card-body">
                @if($user_posts->count() > 0)
                    @foreach($user_posts as $post)
                        <div class="border border-primary p-2 m-2 rounded d-flex justify-content-between align-items-baseline">
                            <a href="/posts/{{ $post->id }}">
                                <div>
                                    {{ $post->created_at }} | post
                                    "{{ $post->title }}" w pokoju {{ $post->room_name }}
                                </div>
                            </a>
                            <div>
                                @if($post->user_id == auth()->user()->id)
                                    <a href="/delete/{{ $post->id }}" class="btn btn-danger btn-small">
                                        <div>
                                            Usuń post
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="border border-primary p-2 m-2 rounded d-flex justify-content-between align-items-baseline">
                        nie masz żadnych postów :(
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
