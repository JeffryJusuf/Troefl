@extends('layouts.main')

@section('container')
    <div class="py-3">
        <small>
            <a href="/" class="text-decoration-none text-secondary">Home</a>
            /
            <a href="/quiz" class="text-decoration-none text-secondary">Quiz</a>
            /
            <a href="/quiz/result" class="text-decoration-none text-secondary">Result</a>
        </small>
    </div>
    <div class="d-flex flex-column">
        <h1 class="pb-5">Quiz Results</h1>
        <p>Your score: {{ $score }}/100</p>
        <table class="table mb-5">
            <thead>
                <tr>
                    <th class="col-sm-1">#</th>
                    <th class="col">Question</th>
                    <th class="col-sm">Your Answer</th>
                    <th class="col-sm">Correct Answer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questionsOrder as $index => $questionId)
                @php
                    $question = $questions->where('id', $questionId)->first();
                    $userAnswer = $responses[$questionId] ? $question->answers->find($responses[$questionId])->answer : 'No answer';
                    $correctAnswer = $question->answers->where('is_correct', true)->first()->answer;
                    $isCorrect = $userAnswer === $correctAnswer;
                    $bgColorClass = $isCorrect ? 'bg-success' : 'bg-danger';
                @endphp
                    <tr>
                        <td class="{{ $bgColorClass }} text-white">{{ $index + 1 }}</td>
                        <td class="{{ $bgColorClass }} text-white">{!! $question->question !!}</td>
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