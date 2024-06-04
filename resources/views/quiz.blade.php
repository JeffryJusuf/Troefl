@extends('layouts.main')

@section('container')
    <div class="py-3">
        <small>
            <a href="/" class="text-decoration-none text-secondary">Home</a>
            /
            <a href="/quiz" class="text-decoration-none text-secondary">Quiz</a>
        </small>
    </div>
    <div class="d-flex flex-column">
        <h1 class="pb-5">Quiz</h1>
        <form action="/quiz" method="POST" id="quiz-form">
            @csrf
            <div class="mb-5">
                @foreach ($questions as $index => $question)
                    <div class="shadow rounded p-3 mb-3">
                        <div class="d-flex">
                            <div class="d-flex align-items-start">
                                <span class="me-2">
                                    {{ $index + 1 }}.
                                </span>
                            </div>
                            <div>
                                <label class="form-label">{!! $question->question !!}</label>
                            </div>
                        </div>
                        <div class="ms-4">
                            @foreach ($question->answers as $answer)
                                <div class="form-check custom-radio">
                                    <input class="form-check-input" type="radio" name="responses[{{ $question->id }}]" id="answer-{{ $answer->id }}" value="{{ $answer->id }}" required>
                                    <label class="form-check-label" for="answer-{{ $answer->id }}">
                                        {{ $answer->answer }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
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

            // Warn user before leaving the page
            const unloadEventHandler = function (e) {
                const confirmationMessage = 'You have unsaved changes. Are you sure you want to leave?';
                e.returnValue = confirmationMessage; // For most browsers
                return confirmationMessage; // For some older browsers
            };

            window.addEventListener('beforeunload', unloadEventHandler);

            // Confirmation dialog on form submit
            form.addEventListener('submit', function (e) {
                const confirmation = confirm('Are you sure you want to submit your answers?');
                if (!confirmation) {
                    e.preventDefault();
                    return;
                }

                // Temporarily disable the beforeunload event listener during form submission
                window.removeEventListener('beforeunload', unloadEventHandler);
            });
        });
    </script>
@endsection