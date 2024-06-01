@extends('layouts.main')

@section('container')
    <div class="py-3">
        <small>
            <a href="/" class="text-decoration-none text-secondary">Home</a>
            /
            <a href="/profile" class="text-decoration-none text-secondary">Profile</a>
            /
            <a href="/profile/scores" class="text-decoration-none text-secondary">All Scores</a>
        </small>
    </div>
    <div class="d-flex flex-column">
        <h1 class="pb-5">All Scores</h1>
        @if ($scores->count())
            <div class="w-50">
                <table class="table border-dark-subtle">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th class="text-end">Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scores as $score)
                            <tr>
                                <td>{{ $score->created_at->timezone('Asia/Bangkok')->format('d M Y H:i:s') }}</td>
                                <td class="text-end">{{ $score->score }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="container d-flex justify-content-center py-3">
                    {{ $scores->links() }}
                </div>
            </div>
        @else
            <h1 class="text-center">No Scores Yet</h1>
        @endif
    </div>
@endsection