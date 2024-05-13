@extends('layouts.main')

@section('container')
<div class="row">
    <div class="d-flex d-flex-column">
        <img src="https://github.com/mdo.png" alt="" width="35" height="35" class="rounded-circle me-3">
        <h6 class="me-3">{{ $discussion->user->username }}</h6>
        <small class="opacity-50">{{ $discussion->created_at->diffForHumans() }}</small>
    </div>
    <h1 class="mt-3 mx-3 px-5">{{ $discussion->title }}</h1>
    <article class="mt-3 mx-3 px-5 pb-5 fs-5">{!! $discussion->body !!}</article>
</div>
@endsection