@extends('layouts.main')

@section('container')
    <style>
        .custom-dropdown-toggle::after {
            display: none; /* Hide the default arrow */
        }

        .custom-dropdown-toggle {
            background: transparent; /* Make the button background transparent */
            border: none; /* Remove border */
            padding: 0; /* Remove padding */
        }

        .custom-dropdown-menu {
            background-color: rgba(255, 255, 255, 0.8); /* Transparent background color */
            width: auto; /* Adjust width to fit content */
            min-width: 0; /* Remove any minimum width set by Bootstrap */
            white-space: nowrap; /* Prevent text from wrapping */
        }

        .custom-dropdown-toggle:focus,
        .custom-dropdown-toggle:active {
            outline: none; /* Remove outline when the button is focused or active */
            box-shadow: none; /* Remove any additional box-shadow */
        }
    </style>
    
    <div class="d-flex border-bottom border-dark-subtle">
        @if ($discussion->user->profile_picture)
            <img src="{{ $discussion->user->profile_picture_url }}" alt="" width="35" height="35"
                class="rounded-circle me-3">
        @else
            <img src="https://github.com/mdo.png" alt="" width="35" height="35" class="rounded-circle me-3">
        @endif
        <div class="row pe-5">
            <div class="d-flex">
                <h6>{{ $discussion->user->username }}
                    @if ($discussion->user->is_admin)
                        <small class="text-secondary"> &#40;Administator&#41;</small>
                    @endif
                </h6>
                <small class="mx-2 fw-bold">·</small>
                <small class="opacity-50">{{ $discussion->created_at->diffForHumans() }}</small>
            </div>
            <h1 class="fw-bold mt-3">{{ $discussion->title }}</h1>
            <article class="py-3 fs-5 lh-sm">{!! $discussion->body !!}</article>
        </div>
        @auth
            @if (auth()->user()->is_admin)
                <div class="ms-auto">
                    <div class="btn-group">
                        <button class="btn dropdown-toggle custom-dropdown-toggle dropdown-menu-start" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>
                        </button>
                        <ul class="dropdown-menu custom-dropdown-menu text-center w-auto">
                            <li>
                                <form action="/discussions/{{ $discussion->slug }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this discussion?')">Delete</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif      
        @endauth
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
