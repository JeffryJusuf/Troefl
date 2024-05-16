@extends('layouts.main')

@section('container')
    <div class="d-flex pb-5 border-bottom border-dark-subtle">
        <img src="https://github.com/mdo.png" alt="" width="200" height="200" class="rounded-circle me-5">
        <dl class="row">
            <h1 class="my-3">{{ auth()->user()->username }}</h1>
            <button class="btn btn-dark btn-sm h-25 my-3 rounded w-auto" type="submit">Edit Profile</button>
        </dl>
    </div>
    <div class="container pt-5">
        <div class="row gx-5">
            <div class="col-4">
                <div class="shadow text-center rounded">
                    <div class="p-5">
                        <h2 class="fw-bold mb-0">Avg. Score</h2>
                        <h1 class="display-1 my-5">N/A</h1>
                        <button type="button" class="btn btn-lg btn-dark rounded mt-5 w-auto" disabled>View Score
                            History</button>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="shadow rounded text-center">
                    <div class="pt-5 pb-4 px-5">
                        <h2 class="fw-bold">Discussion Created</h2>
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
                                {{-- <button type="button" class="btn btn-lg btn-dark rounded container d-flex justify-content-center w-50 mt-4">View All Discussions</button> --}}
                            </div>
                            <div class="container d-flex justify-content-center align-items-center pt-4">
                                {{ $discussions->links() }}
                            </div>
                        @else
                            <h1>No Discussion Created</h1>
                            <button type="button" class="btn btn-lg btn-dark rounded container d-flex justify-content-center w-50 mt-4">Start a Discussion</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
