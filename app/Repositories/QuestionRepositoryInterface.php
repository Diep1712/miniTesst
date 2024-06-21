<?php
namespace App\Repositories;

interface QuestionRepositoryInterface
{
    public function getQuestionsByNumQuestions($numQuestions);
    public function findQuestionById($questionId);
    public function getQuestionsByUserId($userId, $testId);
    public function getQuestionsByIds(array $ids);
    
    public function getQuestionById($questionId);
}
