<?php

namespace App\Repositories;

use App\Models\Question;

use App\Models\UserAnswer;

class QuestionRepository implements QuestionRepositoryInterface
{
    public function getQuestionsByNumQuestions($numQuestions)
    {
        return Question::inRandomOrder()->take($numQuestions)->get();
    }
    
    public function findQuestionById($id)
    {
        return Question::find($id);
    }
    
    public function getQuestionsByUserId($userId)
    {
        return Question::join('user_answers', 'questions.id', '=', 'user_answers.question_id')
                        ->where('user_answers.user_id', $userId)
                        ->select('questions.*')
                        ->get();
    } public function getUserAnswersByUserId($userId)
    {
        return UserAnswer::where('user_id', $userId)->get();
    }
    
    
    public function getQuestionsByIds(array $ids)
    {
        return Question::whereIn('id', $ids)->get();
    }
    
    public function getQuestionsByTestId($testId)
    {
        return Question::join('test_questions', 'questions.id', '=', 'test_questions.question_id')
                        ->where('test_questions.test_id', $testId)
                        ->select('questions.*')
                        ->get();
    }
    public function getQuestionById($questionId)
    {
        return Question::find($questionId);
    }
}
