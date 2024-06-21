<?php

namespace App\Repositories;

use App\Models\UserAnswer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserAnswerRepository implements UserAnswerRepositoryInterface
{
    public function getUserAnswersByUserId($userId)
    {
        return UserAnswer::where('user_id', $userId)->get();
    }

    public function saveUserAnswer($userId, $questionId, $testId, $userAnswer, $isCorrect)
    {
        return UserAnswer::create([
            'user_id' => $userId,
            'question_id' => $questionId,
            'test_id' => $testId,
            'user_answer' => $userAnswer,
            'is_correct' => $isCorrect,
        ]);
    }

    public function getCorrectAnswersCountByTestId($testId)
    {
        return UserAnswer::where('test_id', $testId)
            ->where('is_correct', true)
            ->count();
    }
    public function getResultsByTestId($testId)
    {
        return UserAnswer::where('test_id', $testId)->get();
    }

    public function getTotalQuestionsCountByTestId($testId)
    {
        return UserAnswer::where('test_id', $testId)
            ->count();
    }
    public function getCurrentUserCorrectAnswersCount(): int
    {
        $userId = Auth::id();

        return DB::table('user_answers')
                 ->join('questions', 'user_answers.question_id', '=', 'questions.id')
                 ->where('user_answers.user_id', $userId)
                 ->whereColumn('user_answers.user_answer', 'questions.correct_answer')
                 ->count();
    }

    public function getUserTests($userId)
    {
        return UserAnswer::where('user_id', $userId)
            ->with('test') // Giả sử bạn có quan hệ 'test' được định nghĩa trong model UserAnswer
            ->get();
    }
    public function getTestsByUserId($userId)
    {
        $testIds = UserAnswer::where('user_id', $userId)->distinct()->pluck('test_id');
       // dd($testIds); // Kiểm tra kết quả trả về
        return $testIds;
        }

    public function getUserAnswersByTestId($userId, $testId)
    {
        return UserAnswer::where('user_id', $userId)
                         ->where('test_id', $testId)
                         ->pluck('user_answer', 'question_id')
                         ->toArray();
    }
}
