@extends('layouts.main')

@section('container')
    <div class="d-flex pb-5 border-bottom border-dark-subtle align-items-center">
        @if (auth()->user()->profile_picture)
            <img src="{{ auth()->user()->profile_picture_url }}" alt="" width="200" height="200" class="rounded-circle me-5">
        @else
            <img src="/img/troefl-profile-picture.png" alt="" width="200" height="200" class="rounded-circle me-5">
        @endif
        <dl class="row ps-0">
            <h1 class="d-flex my-3 align-items-center">
                {{ auth()->user()->username }}
                @if($is_admin)
                    <small class="text-secondary fs-3 ms-3">&#40;Administator&#41;</small>
                @endif
            </h1>
            <div>
                <a href="/profile/edit" class="btn btn-dark my-3 w-auto rounded">Edit Profile</a>
            </div>
        </dl>
    </div>
    <div class="container pt-5">
        <div class="row gx-5">
            <div class="col-4">
                <div class="shadow text-center rounded">
                    <div class="p-5">
                        <h2 class="fw-bold mb-0">Avg. Score</h2>
                        <h1 class="display-1 my-5">{{ number_format($averageScore, 2) }}</h1>
                        <a href="/profile/scores" class="btn btn-lg btn-dark rounded w-auto" disabled>View All Scores</a>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="shadow rounded text-center">
                    <div class="pt-5 pb-4 px-5">
                        @if ($discussions->count() > 1)
                            <h2 class="fw-bold">Discussions Created</h2>
                        @else
                            <h2 class="fw-bold">Discussion Created</h2>
                        @endif
                        @if ($discussions->count())
                            <div class="list-group list-group-flush text-start py-3">
                                @foreach ($discussions as $discussion)
                                    <a href="/discussions/{{ $discussion->slug }}"
                                        class="list-group-item list-group-item-action d-flex border-dark-subtle gap-3 py-3"
                                        aria-current="true">
                                        <div class="d-flex gap-2 w-100 justify-content-between">
                                            <div>
                                                <h6 class="mb-0">{{ $discussion->title }}</h6>
                                            </div>
                                            <small class="opacity-50 text-nowrap">{{ $discussion->created_at->diffForHumans() }}</small>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="container d-flex justify-content-center align-items-center pt-4">
                                {{ $discussions->links() }}
                            </div>
                        @else
                            <h1 class="my-5">No Discussion Created</h1>
                            <button type="button" class="btn btn-lg btn-dark rounded container d-flex justify-content-center w-auto my-4">Start a new Discussion</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
