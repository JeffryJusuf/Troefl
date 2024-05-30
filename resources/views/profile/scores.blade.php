@extends('layouts.main')

@section('container')
    <div class="d-flex flex-column">
        <h1 class="pb-5">All Scores</h1>
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
            <div class="d-flex flex-row-reverse">
                <a href="/profile" class="btn btn-dark">Back to Profile</a>
            </div>
        </div>
    </div>
@endsection