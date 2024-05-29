@extends('layouts.main')

@section('container')
<div class="container">
    <h1>Quiz Results</h1>
    <p>Your score: {{ $score }}/100</p>
    <table class="table">
        <thead>
            <tr>
                <th>Question</th>
                <th>Your Answer</th>
                <th>Correct Answer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->question }}</td>
                    <td>
                        {{ $responses[$question->id] ? $question->answers->find($responses[$question->id])->answer : 'No answer' }}
                    </td>
                    <td>{{ $question->answers->where('is_correct', true)->first()->answer }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection