@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="home" aria-selected="true">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="profile" aria-selected="false">Posts</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    <table class="table table-hover table-striped mt-4">
                        <thead>
                            <tr>
                                <td>username</td>
                                <td>user status</td>
                                <td>user posts</td>
                                <td>action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td><a href="/profile/{{ $user->id }}">{{ $user->name }}</a></td>
                                    <td>{{ $user->profile->user_status }}</td>
                                    <td>{{ $user->profile->posts_number }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('banUser', $user->id) }}" class="btn btn-danger btn-sm">x</a>
                                            <a href="{{ route('unBan', $user->id) }}" class="btn btn-primary btn-sm">!x</a>
                                            <a href="{{ route('upUser', $user->id) }}" class="btn btn-success btn-sm">/\</a>
                                            <a href="{{ route('downUser', $user->id) }}" class="btn btn-warning btn-sm">\/</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <div class="tab-pane fade" id="posts" role="tabpanel" aria-labelledby="posts-tab">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
