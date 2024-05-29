@extends('layouts.main')

@section('container')
<div class="container">
    <h1>Quiz</h1>
    <form action="/quiz" method="POST">
        @csrf
        @foreach ($questions as $question)
            <div class="mb-3">
                <label class="form-label">{{ $question->question }}</label>
                @foreach ($question->answers as $answer)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="responses[{{ $question->id }}]" id="answer-{{ $answer->id }}" value="{{ $answer->id }}" required>
                        <label class="form-check-label" for="answer-{{ $answer->id }}">
                            {{ $answer->answer }}
                        </label>
                    </div>
                @endforeach
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('quiz-form');

        form.reset(); // Reset form to ensure answers are cleared on refresh

        // Attach event listener to labels to toggle radio buttons
        form.querySelectorAll('.form-check-label').forEach(label => {
            label.addEventListener('click', function () {
                const radioId = this.getAttribute('for');
                document.getElementById(radioId).checked = true;
            });
        });
    });
</script>
@endsection