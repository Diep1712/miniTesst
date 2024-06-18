<?php

namespace App\Http\Controllers;

use App\Services\UserAnswerService;
use Illuminate\Http\Request;

class UserAnswerController extends Controller
{
    protected $userAnswerService;

    public function __construct(UserAnswerService $userAnswerService)
    {
        $this->userAnswerService = $userAnswerService;
    }

    public function getCurrentUserCorrectAnswersCount()
    {
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

    public function show($course)
    {
        // Phương thức show nhận tham số $course từ route
        return view('show', ['course' => $course]);
    }
}
