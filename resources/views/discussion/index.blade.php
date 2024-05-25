@extends('layouts.main')

@section('container')
    <div class="d-flex border-bottom border-dark-subtle">
        @if ($discussion->user->profile_picture)
            <img src="{{ $discussion->user->profile_picture_url }}" alt="" width="35" height="35" class="rounded-circle me-3">
        @else
            <img src="https://github.com/mdo.png" alt="" width="35" height="35" class="rounded-circle me-3">
        @endif
        <div class="row pe-5">
            <div class="d-flex d-flex-column">
                <h6>{{ $discussion->user->username }}
                    @if($discussion->user->is_admin)
                        <small class="text-secondary"> &#40;Administator&#41;</small>
                    @endif
                </h6>
                <small class="mx-2 fw-bold">·</small>
                <small class="opacity-50">{{ $discussion->created_at->diffForHumans() }}</small>
            </div>
            <h1 class="fw-bold mt-3">{{ $discussion->title }}</h1>
            <article class="py-3 fs-5 lh-sm">{!! $discussion->body !!}</article>
        </div>
    </div>
    @auth
        @include('discussion.addcomment')
    @else
        <div class="d-flex justify-content-center py-3">
            <a class="btn btn-dark" href="/login">Login to leave a comment</a>
        </div>
    @endauth
    @include('discussion.comments', ['comments' => $discussion->comments, 'discussion_id' => $discussion->id])
@endsection
