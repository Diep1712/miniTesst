<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ResultService;
use Illuminate\Support\Facades\Auth;
use App\Services\UserAnswerService;


class ResultController extends Controller
{
    protected $resultService;
    protected $userAnswerService;

    public function __construct(ResultService $resultService ,  UserAnswerService $userAnswerService,)
    {
        $this->resultService = $resultService;
        $this->userAnswerService = $userAnswerService;
    }

    public function showResult(Request $request)
    {
        $userId = Auth::id();
        $answers = $request->input('answers'); // Giả sử bạn nhận được câu trả lời từ request

        $this->resultService->saveAnswersToDatabase($answers);
     
        $result = $this->resultService->calculateResult($userId);
        return view('result', ['result' => $result]);
    }
    public function getCurrentUserCorrectAnswersCount()
    {
    // Khai báo biến $answers để tránh lỗi Undefined variable

        // Gọi phương thức để lưu câu trả lời của người dùng và nhận lại testId
        
        $count = $this->userAnswerService->getCurrentUserCorrectAnswersCount();
        $course = $this->suggestCourseBasedOnScore($count);

        // Trả về view 'course' với các biến count, course, và courseId
        return view('course', [
            'count' => $count,
            'course' => $course,
            'courseId' => $course, // Sử dụng $courseId bằng giá trị $course
        ]);
    }

    public function suggestCourseBasedOnScore($score)
    {
        if ($score >= 0 && $score <= 2) {
            return "Beginner (Sơ cấp 1)";
        } elseif ($score >= 3 && $score <= 5) {
            return "High Beginner (Sơ cấp 2)";
        } elseif ($score >= 6 && $score <= 8) {
            return "Low Intermediate (Trung cấp 1)";
        } elseif ($score >= 9 && $score <= 11) {
            return "Intermediate (Trung cấp 2)";
        } elseif ($score >= 12) {
            return "Low Advanced (Cao cấp 1)";
        } else {
            return "Không xác định";
        }
    }

}
