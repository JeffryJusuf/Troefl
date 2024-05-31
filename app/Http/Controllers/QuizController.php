<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Score;
use App\Models\UserResponse;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $questions = Question::withAnswers()->inRandomOrder()->take(20)->get();

        foreach ($questions as $question) {
            $question->answers = $question->answers->shuffle();
        }

        return view('quiz', [
            'title' => 'Quiz',
            'active' => 'quiz',
            'questions' => $questions
        ]);
    }

    public function submit(Request $request)
    {
        $score = 0;
        $responses = [];

        foreach ($request->responses as $questionId => $answerId) {
            $question = Question::withAnswers()->find($questionId);
            $correctAnswer = $question->answers->where('is_correct', true)->first();

            if ($correctAnswer && $correctAnswer->id == $answerId) {
                $score++;
            }

            $responses[] = [
                'user_id' => auth()->id(),
                'question_id' => $questionId,
                'answer_id' => $answerId,
            ];
        }

        UserResponse::insert($responses);

        $score = ($score / 20) * 100;

        // Store the score in the scores table
        Score::create([
            'user_id' => auth()->id(),
            'score' => $score
        ]);

        $result = [
            'title' => 'Quiz',
            'active' => 'quiz',
            'score' => $score,
            'questions' => Question::withAnswers()->find(array_keys($request->responses)),
            'responses' => collect($request->responses)
        ];
    
        return redirect('/quiz/result')->with('result', $result);
    }

    public function result()
    {
        $result = session('result');
    
        if (!$result) {
            return redirect('/quiz');
        }
    
        return view('quiz.result', $result);
    }

    public function showManageQuiz()
    {
        return view('quiz.manage-quiz', [
            'title' => 'Manage Quiz',
            'active' => 'manage-quiz',
            'questions' => Question::latest()->withAnswers()->paginate(10)
        ]);
    }

    public function showInsertForm()
    {
        return view('quiz.insert-question', [
            'title' => 'Insert Question',
            'active' => 'manage-quiz'
        ]);
    }

    public function insertQuestion(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'correct_answer' => 'required|string|max:255',
            'false_answers.*' => 'required|string|max:255',
        ]);

        $question = Question::create([
            'question' => $request->input('question'),
        ]);

        // Insert the correct answer
        Answer::create([
            'question_id' => $question->id,
            'answer' => $request->input('correct_answer'),
            'is_correct' => true,
        ]);

        // Insert false answers
        foreach ($request->input('false_answers') as $falseAnswer) {
            Answer::create([
                'question_id' => $question->id,
                'answer' => $falseAnswer,
                'is_correct' => false,
            ]);
        }

        return redirect('/manage-quiz')->with('success', 'Question inserted successfully!');
    }

    public function showEditForm($id)
    {
        $question = Question::withAnswers()->findOrFail($id);

        return view('quiz.edit-question', [
            'title' => 'Edit Question',
            'active' => 'manage-quiz',
            'question' => $question
        ]);
    }

    public function updateQuestion(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'correct_answer' => 'required|string|max:255',
            'false_answers' => 'required|array|min:1',
            'false_answers.*' => 'required|string|max:255',
        ]);

        $question = Question::findOrFail($id);
        $question->update([
            'question' => $request->question,
        ]);

        // Update correct answer
        $correctAnswer = $question->answers()->where('is_correct', true)->first();
        $correctAnswer->update([
            'answer' => $request->correct_answer,
        ]);

        // Update false answers
        $falseAnswers = $question->answers()->where('is_correct', false)->get();
        foreach ($falseAnswers as $index => $falseAnswer) {
            if (isset($request->false_answers[$index])) {
                $falseAnswer->update([
                    'answer' => $request->false_answers[$index],
                ]);
            } else {
                $falseAnswer->delete();
            }
        }

        // Add new false answers if any
        if (count($request->false_answers) > count($falseAnswers)) {
            for ($i = count($falseAnswers); $i < count($request->false_answers); $i++) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer' => $request->false_answers[$i],
                    'is_correct' => false,
                ]);
            }
        }

        return redirect('/manage-quiz')->with('success', 'Question updated successfully!');
    }

    public function deleteQuestion($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect('/manage-quiz')->with('success', 'Question deleted successfully!');
    }
}
