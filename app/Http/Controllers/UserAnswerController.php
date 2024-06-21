<?php

namespace App\Http\Controllers;

use App\Services\UserAnswerService;
use App\Services\ResultService;
use Illuminate\Http\Request;
use App\Repositories\UserAnswerRepositoryInterface;
use App\Models\Question;
use App\Models\UserAnswer;
use Illuminate\Support\Facades\Auth;

class UserAnswerController extends Controller
{
    protected $userAnswerService;
    protected $userTestRepository;
    protected $resultService;

    public function __construct(
        UserAnswerService $userAnswerService,
        UserAnswerRepositoryInterface $userTestRepository,
        ResultService $resultService
    ) {
        $this->userAnswerService = $userAnswerService;
        $this->userTestRepository = $userTestRepository;
        $this->resultService = $resultService;
    }

    // public function getCurrentUserCorrectAnswersCount()
    // {
    //     $answers = []; // Khai báo biến $answers để tránh lỗi Undefined variable

    //     // Gọi phương thức để lưu câu trả lời của người dùng và nhận lại testId
    //     $testId = $this->resultService->saveAnswersToDatabase($answers);
    //     $count = $this->userAnswerService->getCurrentUserCorrectAnswersCount($testId);
    //     $course = $this->suggestCourseBasedOnScore($count);

    //     // Trả về view 'course' với các biến count, course, và courseId
    //     return view('course', [
    //         'count' => $count,
    //         'course' => $course,
    //         'courseId' => $course, // Sử dụng $courseId bằng giá trị $course
    //     ]);
    // }

    // public function suggestCourseBasedOnScore($score)
    // {
    //     if ($score >= 0 && $score <= 2) {
    //         return "Beginner (Sơ cấp 1)";
    //     } elseif ($score >= 3 && $score <= 5) {
    //         return "High Beginner (Sơ cấp 2)";
    //     } elseif ($score >= 6 && $score <= 8) {
    //         return "Low Intermediate (Trung cấp 1)";
    //     } elseif ($score >= 9 && $score <= 11) {
    //         return "Intermediate (Trung cấp 2)";
    //     } elseif ($score >= 12) {
    //         return "Low Advanced (Cao cấp 1)";
    //     } else {
    //         return "Không xác định";
    //     }
    // }

    public function getUserTests(Request $request)
    {
        $inputValue = $request->input('input_value');
        $testIds = $this->userTestRepository->getTestsByUserId($inputValue);
        return view('ShowPoint', ['userId' => $inputValue, 'uniqueTests' => $testIds]);
    }

    public function reviewTest($userId, $testId)
    {
        // Lấy danh sách các câu hỏi và câu trả lời của test có ID là $testId và thuộc user có ID là $userId
        $questions = Question::whereHas('tests', function ($query) use ($testId) {
            $query->where('tests.id', $testId);
        })->get();

        // Lấy câu trả lời của người dùng cho các câu hỏi trong test
        $userAnswers = UserAnswer::where('user_id', $userId)
                                ->where('test_id', $testId)
                                ->pluck('user_answer', 'question_id')
                                ->toArray();

        return view('DescriptionAaswers', compact('questions', 'userAnswers'));
    }

    public function EditPoint()
    {
        return view('EditPoint');
    }

    public function setCourseLimits(Request $request)
    {
        $request->validate([
            'beginner_min' => 'required|integer',
            'beginner_max' => 'required|integer',
            'intermediate_min' => 'required|integer',
            'intermediate_max' => 'required|integer',
            'advanced_min' => 'required|integer',
        ]);

        // Lưu các giới hạn vào session hoặc cơ sở dữ liệu tùy nhu cầu
        session([
            'beginner_min' => $request->beginner_min,
            'beginner_max' => $request->beginner_max,
            'intermediate_min' => $request->intermediate_min,
            'intermediate_max' => $request->intermediate_max,
            'advanced_min' => $request->advanced_min,
        ]);

        return redirect()->route('set.course'); // Điều hướng về trang khóa học
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
}
