@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mystyle.css') }}" >
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <h2>Forum Loośne gatki</h2>
                @if($profile->user_status == "admin")
                    <a href="/room/create">Dodaj pokój</a>
                @endif
            </div>
            @foreach($rooms as $room)
                @if($room->parent_id == 0)
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="room/{{ $room->id }}">{{ $room->name }}</a></li>
                            @foreach($rooms as $subroom)
                                @if($subroom->parent_id == $room->id)
                                    <li class="breadcrumb-item"><a href="room/{{ $subroom->id }}">{{ $subroom->name }}</a></li>
                                @endif
                            @endforeach
                        </ol>
                    </nav>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
