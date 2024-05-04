@extends('layouts.main')

@section('container')
<div class="d-flex flex-column">
    <h1 class="pb-5">Discussion</h1>
    <form class="d-flex form-inline my-2 my-lg-0 w-75">
        <input class="form-control mr-sm-2 rounded-0 rounded-start" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-dark my-2 my-sm-0 rounded-0 rounded-end" type="submit">Search</button>
      </form>
    <div class="d-flex flex-column flex-md-row py-4 gap-4 align-items-center justify-content-start">
        <div class="list-group list-group-flush w-75">
          <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
              <div>
                <h6 class="mb-0">List group item heading</h6>
                <p class="mb-0 opacity-75">Username</p>
              </div>
              <small class="opacity-50 text-nowrap">now</small>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
              <div>
                <h6 class="mb-0">Another title here</h6>
                <p class="mb-0 opacity-75">Username</p>
              </div>
              <small class="opacity-50 text-nowrap">3d</small>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
              <div>
                <h6 class="mb-0">Third heading</h6>
                <p class="mb-0 opacity-75">Username</p>
              </div>
              <small class="opacity-50 text-nowrap">1w</small>
            </div>
          </a>
        </div>
      </div>
</div>
@endsection