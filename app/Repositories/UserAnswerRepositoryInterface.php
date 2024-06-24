<?php

namespace App\Repositories;

interface UserAnswerRepositoryInterface
{
    public function saveUserAnswer($userId, $questionId, $testId, $userAnswer, $isCorrect);
    public function getCorrectAnswersCountByTestId($testId);
    public function getTotalQuestionsCountByTestId($testId);
    public function getUserAnswersByUserId($userId);
    public function getResultsByTestId($testId);
    public function getCurrentUserCorrectAnswersCount($userId, $testId);

    public function getUserTests($userId);
    public function getTestsByUserId($userId);
    public function getUserAnswersByTestId($userId, $testId);
}
