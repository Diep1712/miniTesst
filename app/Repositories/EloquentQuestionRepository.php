<?php

namespace App\Repositories;

use App\Models\Question;

class EloquentQuestionRepository implements QuestionRepositoryInterface
{
    public function getQuestions($limit)
    {
        return Question::inRandomOrder()->limit($limit)->get();
    }

    public function findQuestionById($id)
    {
        return Question::find($id);
    }
}
