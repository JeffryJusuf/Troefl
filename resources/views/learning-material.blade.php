@extends('layouts.main')

@section('container')
    <div class="py-3">
        <small>
            <a href="/" class="text-decoration-none text-secondary">Home</a>
            /
            <a href="/learning-material" class="text-decoration-none text-secondary">Learning Material</a>
        </small>
    </div>
    <div class="d-flex flex-column">
        <h1 class="pb-5">Learning Material</h1>
        <div class="d-flex flex-column flex-md-row gap-4">
            <div class="list-group list-group-flush w-75">
                <a href="/learning-material/nouns" class="list-group-item list-group-item-action d-flex border-dark-subtle gap-3 py-3" aria-current="true">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h5 class="mb-0">Nouns</h5>
                        </div>
                    </div>
                </a>
                <a href="/learning-material/tenses" class="list-group-item list-group-item-action d-flex border-dark-subtle gap-3 py-3" aria-current="true">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h5 class="mb-0">Tenses</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
