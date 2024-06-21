<?php

namespace App\Services;

use App\Repositories\QuestionRepositoryInterface;
use App\Repositories\UserAnswerRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\Test;
use App\Models\TestQuestion;

class ResultService 
{
    protected $questionRepository;
    protected $userAnswerRepository;

    public function __construct(
        QuestionRepositoryInterface $questionRepository,
        UserAnswerRepositoryInterface $userAnswerRepository
    ) {
        $this->questionRepository = $questionRepository;
        $this->userAnswerRepository = $userAnswerRepository;
    }

    public function saveAnswersToDatabase($answers)
{
    $userId = Auth::id();
    $questions = $this->questionRepository->getQuestionsByIds(array_keys($answers));

    $test = Test::create([
        'user_id' => $userId,
    ]);

    $testId = $test->id; // Lưu test_id vào biến $testId

    foreach ($questions as $question) {
        TestQuestion::create([
            'test_id' => $testId,
            'question_id' => $question->id,
        ]);
    }

    foreach ($answers as $questionId => $userAnswer) {
        $question = $this->questionRepository->findQuestionById($questionId);
        $isCorrect = $question && $question->correct_answer === $userAnswer ? 1 : 0;

        $this->userAnswerRepository->saveUserAnswer($userId, $questionId, $testId, $userAnswer, $isCorrect);
    }

    return $testId; // Trả về test_id để có thể sử dụng trong phương thức khác
}

    public function calculateResult($userId) {
        // Lấy các câu trả lời của người dùng từ bảng user_answers
        $userAnswers = $this->userAnswerRepository->getResultsByTestId($userId);

        $correctAnswers = 0;
        $totalQuestions = count($userAnswers); // Tổng số câu hỏi trong bài kiểm tra

        foreach ($userAnswers as $userAnswer) {
            // Lấy đáp án đúng từ bảng questions dựa trên question_id
            $question = $this->questionRepository->getQuestionById($userAnswer->question_id);

            if ($question && $userAnswer->user_answer === $question->correct_answer) {
                $correctAnswers++;
            }
        }

        $course = $this->determineCourse($correctAnswers);

        return [
            'correct' => $correctAnswers,
            'total_score' => $totalQuestions,
            'percentage' => ($totalQuestions > 0) ? ($correctAnswers / $totalQuestions) * 100 : 0,
            'course' => $course,
        ];


    }    protected function determineCourse($correctAnswers)
    {
        if ($correctAnswers >= 1 && $correctAnswers <= 4) {
            return 'Beginner';
        } elseif ($correctAnswers > 2 && $correctAnswers <= 7) {
            return 'Intermediate';
        } elseif ($correctAnswers > 7) {
            return 'Advanced';
        } else {
            return 'No course recommended';
        }
    }


   
}

