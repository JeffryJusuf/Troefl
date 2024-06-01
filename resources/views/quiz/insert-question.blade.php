@extends('layouts.main')

@section('container')
    <div class="d-flex flex-column">
        <h1 class="pb-5">Insert Question</h1>
        <form action="/manage-quiz/insert-question" method="POST">
            @csrf
            <div class="mb-3">
                <textarea type="text" class="form-control @error('question') is-invalid @enderror custom-textarea" id="question" name="question" placeholder="Enter a new question" required>
                    {{ old('question') }}
                </textarea>
                @error('question')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <input type="text" class="form-control @error('correct_answer') is-invalid @enderror custom-textarea" id="correct_answer" name="correct_answer" placeholder="Enter the correct answer" required value="{{ old('correct_answer') }}">
                @error('correct_answer')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="false-answers-container">Enter the false answer&#40;s&#41;:</label>
            </div>
            <div class="mb-5" id="false-answers-container">
                <div class="mb-3" id="false-answer-0">
                    <input type="text" class="form-control @error('false_answers.0') is-invalid @enderror custom-textarea" id="false_answers_0" name="false_answers[]" placeholder="False answer 1" required value="{{ old('false_answer.0') }}">
                    @error('false_answer.0')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3" id="false-answer-1">
                    <div class="input-group">
                        <input type="text" class="form-control @error('false_answers.1') is-invalid @enderror custom-textarea" id="false_answers_1" name="false_answers[]" placeholder="False answer 2" required value="{{ old('false_answer.1') }}">
                        @error('false_answer.1')
                            <div class="invalid-tooltip">
                                {{ $message }}
                            </div>
                        @enderror
                        <button type="button" class="btn btn-danger remove-false-answer">Remove</button>
                    </div>
                </div>
                <div class="mb-3" id="false-answer-2">
                    <div class="input-group">
                        <input type="text" class="form-control @error('false_answers.2') is-invalid @enderror custom-textarea" id="false_answers_2" name="false_answers[]" placeholder="False answer 3" required value="{{ old('false_answer.2') }}">
                        @error('false_answer.2')
                            <div class="invalid-tooltip">
                                {{ $message }}
                            </div>
                        @enderror
                        <button type="button" class="btn btn-danger remove-false-answer">Remove</button>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row-reverse">
                <button type="button" class="btn btn-secondary mb-5" id="add-false-answer">Add More False Answer</button>
            </div>
            <div class="d-flex flex-row-reverse">
                <button type="submit" class="btn btn-dark">Insert Question</button>
                <a href="/manage-quiz" class="btn btn-dark me-3">Back</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let falseAnswerCount = {{ count(old('false_answers', ['', ''])) }};

            document.getElementById('add-false-answer').addEventListener('click', function () {
                const container = document.getElementById('false-answers-container');
                const newIndex = container.children.length;

                const newFalseAnswerDiv = document.createElement('div');
                newFalseAnswerDiv.classList.add('mb-3');
                newFalseAnswerDiv.id = `false-answer-${newIndex}`;

                const newInputGroup = document.createElement('div');
                newInputGroup.classList.add('input-group');

                const newInput = document.createElement('input');
                newInput.type = 'text';
                newInput.classList.add('form-control');
                newInput.id = `false_answers_${newIndex}`;
                newInput.name = 'false_answers[]';
                newInput.placeholder = `False answer ${newIndex + 1}`;
                newInput.required = true;

                const newRemoveButton = document.createElement('button');
                newRemoveButton.type = 'button';
                newRemoveButton.classList.add('btn', 'btn-danger', 'remove-false-answer');
                newRemoveButton.textContent = 'Remove';

                if (newIndex > 0) {
                    newInputGroup.appendChild(newRemoveButton);
                }
                newInputGroup.insertBefore(newInput, newInputGroup.firstChild);
                newFalseAnswerDiv.appendChild(newInputGroup);
                container.appendChild(newFalseAnswerDiv);

                falseAnswerCount++;
            });

            document.getElementById('false-answers-container').addEventListener('click', function (event) {
                if (event.target.classList.contains('remove-false-answer')) {
                    const falseAnswerDiv = event.target.closest('.mb-3');
                    falseAnswerDiv.remove();
                    // Update placeholders
                    const falseAnswers = container.children;
                    for (let i = 0; i < falseAnswers.length; i++) {
                        const falseAnswer = falseAnswers[i];
                        const input = falseAnswer.querySelector('input');
                        input.placeholder = `False answer ${i + 1}`;
                    }
                }
            });
        });
    </script>
@endsection
