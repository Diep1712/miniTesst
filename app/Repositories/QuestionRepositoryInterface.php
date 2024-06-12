<?php
namespace App\Repositories;

interface QuestionRepositoryInterface
{
    public function getQuestions($limit);
    public function findQuestionById($id);
}