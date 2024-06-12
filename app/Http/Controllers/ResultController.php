<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\QuestionRepositoryInterface;
use App\Models\Result;

class ResultController extends Controller
{
    protected $resultRepository;

    public function __construct(QuestionRepositoryInterface $resultRepository)
    {
        $this->resultRepository = $resultRepository;
    }

    public function submitQuiz(Request $request)
    {
        $answers = $request->input('answers');
        $correctAnswers = $this->calculateCorrectAnswers($answers);

        $totalQuestions = count($answers);
        $result = [
            'correct' => $correctAnswers,
            'total' => $totalQuestions,
            'percentage' => ($correctAnswers / $totalQuestions) * 100,
            'course' => $this->determineCourse($correctAnswers)
        ];

        // Lưu kết quả vào cơ sở dữ liệu
        $this->saveResultToDatabase($correctAnswers);

        // Trả về view 'result' với dữ liệu kết quả
        return view('result', compact('result'));
    }

    protected function calculateCorrectAnswers($answers)
    {
        $correctAnswers = 0;

        foreach ($answers as $questionId => $userAnswer) {
            $question = $this->resultRepository->findQuestionById($questionId);
            if ($question && $question->correct_answer == $userAnswer) {
                $correctAnswers++;
            }
        }

        return $correctAnswers;
    }

    protected function determineCourse($correctAnswers)
    {
        if ($correctAnswers >= 1 && $correctAnswers <= 4) {
            return 'Beginner';
        } elseif ($correctAnswers > 4 && $correctAnswers <= 7) {
            return 'Intermediate';
        } elseif ($correctAnswers > 7) {
            return 'Advanced';
        } else {
            return 'No course recommended';
        }
    }

    protected function saveResultToDatabase($correctAnswers)
    {
        // Giả sử user_id được lưu trong session (auth()->id() hoặc logic tương tự)
        $userId = 4; // Thay thế bằng cách lấy user ID động
        // Thay thế bằng logic lấy ID của bài kiểm tra thực tế

        $result = new Result();
        $result->user_id = $userId;
        
        $result->score = $correctAnswers;
        $result->save();
    }
}
