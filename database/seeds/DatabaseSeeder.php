<?php

use App\Answer;
use App\Question;
use App\User;
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
        factory(User::class, 10)->create()->each(function (User $user) {
            $questions = factory(Question::class, rand(1, 5))->make();
            $user->questions()
                ->saveMany($questions)
                ->each(function (Question $question) {
                    $answers = factory(Answer::class, rand(1, 5))->make();
                    $question->answers()->saveMany($answers);
                });
        });
    }
}
