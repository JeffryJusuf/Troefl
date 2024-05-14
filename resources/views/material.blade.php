@extends('layouts.main')

@section('container')
    <div class="d-flex flex-column">
        <h1 class="pb-5">Learning Material</h1>
        <div class="d-flex flex-column flex-md-row gap-4">
            <div class="list-group list-group-flush w-75">
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h5 class="mb-0">List group item heading</h5>
                        </div>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h5 class="mb-0">Another title here</h5>
                        </div>
                    </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h5 class="mb-0">Third heading</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
