@extends('layouts.main')

@section('container')
    <div class="d-flex flex-column">
        <h1 class="pb-5">Discussions</h1>
        <form action="/discussions" class="d-flex form-inline my-2 my-lg-0 w-75">
            <input class="form-control rounded-0 rounded-start" type="text" placeholder="Search" name="search" value="{{ request('search') }}">
            <button class="btn btn-dark rounded-0 rounded-end" type="submit">Search</button>
        </form>
        <div class="d-flex flex-column flex-md-row py-4 gap-4 align-items-center justify-content-start">
            @if ($discussions->count())
                <div class="list-group list-group-flush w-75">
                    @foreach ($discussions as $discussion)
                        <a href="/discussions/show/{{ $discussion->slug }}"
                            class="list-group-item list-group-item-action d-flex border-dark-subtle gap-3 py-3"
                            aria-current="true">
                            <div class="d-flex gap-2 w-100 justify-content-between">
                                <div>
                                    <h5 class="mb-0">{{ $discussion->title }}</h5>
                                    <small class="mb-0 opacity-75">{{ $discussion->user->username }}
                                        @if ($discussion->user->is_admin)
                                            <small class="text-secondary"> &#40;Administator&#41;</small>
                                        @endif
                                    </small>
                                </div>
                                <small class="opacity-50 text-nowrap">{{ $discussion->created_at->diffForHumans() }}</small>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <h1 class="text-center">No Discussion Found</h1>
            @endif
        </div>
        <div class="container d-flex justify-content-center py-3">
            {{ $discussions->links() }}
        </div>
    </div>
    @auth
        <div class="position-relative">
            <div class="position-fixed bottom-0 end-0 pe-5 m-5">
                <a href="/discussions/start-discussion" class="btn btn-dark rounded-circle shadow-lg p-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg>
                </a>
            </div>
        </div>
    @endauth
@endsection
