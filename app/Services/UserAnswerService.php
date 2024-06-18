<?php

namespace App\Services;

use App\Repositories\UserAnswerRepositoryInterface;

class UserAnswerService
{
    protected $userAnswerRepository;

    public function __construct(UserAnswerRepositoryInterface $userAnswerRepository)
    {
        $this->userAnswerRepository = $userAnswerRepository;
    }

    public function getCurrentUserCorrectAnswersCount(): int
    {
        return $this->userAnswerRepository->getCurrentUserCorrectAnswersCount();
    }
}
