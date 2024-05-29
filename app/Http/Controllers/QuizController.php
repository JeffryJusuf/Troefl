<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Score;
use App\Models\UserResponse;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $questions = Question::with('answers')->inRandomOrder()->take(20)->get();

        foreach ($questions as $question) {
            $question->answers = $question->answers->shuffle();
        }

        // return view('quiz.index', compact('questions'));

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
            $question = Question::find($questionId);
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
            'questions' => Question::with('answers')->find(array_keys($request->responses)),
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
}
