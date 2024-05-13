@extends('layouts.main')

@section('container')
<div class="d-flex flex-column">
    <h1 class="pb-5">Discussions</h1>
    <form class="d-flex form-inline my-2 my-lg-0 w-75">
        <input class="form-control mr-sm-2 rounded-0 rounded-start" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-dark my-2 my-sm-0 rounded-0 rounded-end" type="submit">Search</button>
      </form>
    <div class="d-flex flex-column flex-md-row py-4 gap-4 align-items-center justify-content-start">
        <div class="list-group list-group-flush w-75">
            @if ($discussions->count())
                @foreach ($discussions as $discussion)
                    <a href="/discussions/{{ $discussion->slug }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                      <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                          <h5 class="mb-0">{{ $discussion->title }}</h5>
                          <small class="mb-0 opacity-75">{{ $discussion->user->username }}</small>
                        </div>
                        <small class="opacity-50 text-nowrap">{{ $discussion->created_at->diffForHumans() }}</small>
                      </div>
                    </a>    
                @endforeach
            @endif
        </div>
      </div>
</div>
@endsection