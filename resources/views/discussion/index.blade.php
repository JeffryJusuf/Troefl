@extends('layouts.main')

@section('container')
    <div class="d-flex border-bottom border-dark-subtle">
        <img src="https://github.com/mdo.png" alt="" width="35" height="35" class="rounded-circle me-3">
        <div class="row pe-5">
            <div class="d-flex d-flex-column">
                <h6>{{ $discussion->user->username }}</h6>
                <small class="mx-2 fw-bold">·</small>
                <small class="opacity-50">{{ $discussion->created_at->diffForHumans() }}</small>
            </div>
            <h1 class="fw-bold mt-3">{{ $discussion->title }}</h1>
            <article class="py-3 fs-5 lh-sm">{!! $discussion->body !!}</article>
        </div>
    </div>
    @include('discussion.comments', ['comments' => $discussion->comments, 'discussion_id' => $discussion->id])
@endsection
