@extends('layouts.main')

@section('container')
<div class="d-flex flex-column">
    <h1 class="p-5">Discussion</h1>
    <form class="d-flex px-5 form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2 rounded-0" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-dark my-2 my-sm-0 rounded-0" type="submit">Search</button>
      </form>
    <div class="d-flex flex-column flex-md-row px-5 py-4 gap-4 align-items-center justify-content-center">
        <div class="list-group list-group-flush">
          <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
              <div>
                <h6 class="mb-0">List group item heading</h6>
                <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
              </div>
              <small class="opacity-50 text-nowrap">now</small>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
              <div>
                <h6 class="mb-0">Another title here</h6>
                <p class="mb-0 opacity-75">Some placeholder content in a paragraph that goes a little longer so it wraps to a new line.</p>
              </div>
              <small class="opacity-50 text-nowrap">3d</small>
            </div>
          </a>
          <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
              <div>
                <h6 class="mb-0">Third heading</h6>
                <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
              </div>
              <small class="opacity-50 text-nowrap">1w</small>
            </div>
          </a>
        </div>
      </div>
</div>
@endsection