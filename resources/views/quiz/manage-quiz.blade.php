@extends('layouts.main')

@section('container')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="py-3">
        <small>
            <a href="/" class="text-decoration-none text-secondary">Home</a>
            /
            <a href="/manage-quiz" class="text-decoration-none text-secondary">Manage Quiz</a>
        </small>
    </div>
    <div class="d-flex flex-column">
        <h1 class="pb-5">Manage Quiz</h1>
        @if ($questions->count())
            <div class="list-group list-group-flush w-75">
                @foreach ($questions as $question)
                    <a href="/manage-quiz/edit-question/{{ $question->id }}" class="list-group-item list-group-item-action d-flex gap-3 py-3 border-dark-subtle" aria-current="true">
                        <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                                <div class="fs-6 mb-0">{!! $question->question !!}</div>
                            </div>
                            <div>
                                <form action="/manage-quiz/delete-question/{{ $question->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn text-danger" data-question-id="{{ $question->id }}" onclick="return confirm('Are you sure you want to delete this discussion?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x fw-bolder" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M3.146 3.146a.5.5 0 0 1 .708 0L8 7.293l4.146-4.147a.5.5 0 0 1 .708.708L8.707 8l4.147 4.146a.5.5 0 0 1-.708.708L8 8.707l-4.146 4.147a.5.5 0 0 1-.708-.708L7.293 8 3.146 3.854a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
        <div class="container d-flex justify-content-center pt-3">
            {{ $questions->links() }}
        </div>
    </div>
    <div class="position-relative">
        <div class="position-fixed bottom-0 end-0 pe-5 m-5">
            <a href="/manage-quiz/insert-question" class="btn btn-dark rounded-circle shadow-lg p-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg>
            </a>
        </div>
    </div>
@endsection