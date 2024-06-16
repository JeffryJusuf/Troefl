<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Comment;
use App\Models\Discussion;
use App\Models\Question;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'username' => 'jeffry',
            'email' => 'jeffry.jusuf.24@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => '1',
        ]);

        // User::factory(5)->create();

        // Discussion::factory(50)->create();

        // Comment::factory(100)->create();

        // Reply::factory(75)->create();

        // Generate questions with answers
        // Question::factory()
        //     ->count(30) // Number of questions
        //     ->create()
        //     ->each(function ($question) {
        //         // Create 4 answers for each question
        //         $answers = Answer::factory()
        //             ->count(4)
        //             ->make();

        //         // Randomly choose one answer to be correct
        //         $correctAnswerIndex = rand(0, 3);
        //         $answers[$correctAnswerIndex]->is_correct = true;

        //         // Save answers to the question
        //         $question->answers()->saveMany($answers);
        //     });
        
        $this->call(QuestionSeeder::class);
        $this->call(AnswerSeeder::class);
    }
}
