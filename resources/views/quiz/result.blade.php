@extends('layouts.main')

@section('container')
    <div class="d-flex flex-column">
        <h1 class="pb-5">Quiz Results</h1>
        <p>Your score: {{ $score }}/100</p>
        <table class="table mb-5">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Your Answer</th>
                    <th>Correct Answer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                    @php
                        $userAnswer = $responses[$question->id] ? $question->answers->find($responses[$question->id])->answer : 'No answer';
                        $correctAnswer = $question->answers->where('is_correct', true)->first()->answer;
                        $isCorrect = $userAnswer === $correctAnswer;
                        $bgColorClass = $isCorrect ? 'bg-success' : 'bg-danger';
                    @endphp
                    <tr>
                        <td class="{{ $bgColorClass }} text-white">{{ $question->question }}</td>
                        <td class="{{ $bgColorClass }} text-white">{{ $userAnswer }}</td>
                        <td class="{{ $bgColorClass }} text-white">{{ $correctAnswer }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex flex-row-reverse">
            <a href="/quiz" type="submit" class="btn btn-dark">Try Again</a>
        </div>
    </div>
    
    <script>
        window.addEventListener('beforeunload', function (e) {
                e.preventDefault();
                e.returnValue = 'Are you sure you want to leave the page? Your unsaved changes may be lost.';
            });
    </script>
@endsection