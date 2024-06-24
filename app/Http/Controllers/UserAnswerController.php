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

    

    public function setCourseLimits(Request $request)
    {
        $request->validate([
            'beginner_min' => 'required|integer',
            'beginner_max' => 'required|integer',
            'intermediate_min' => 'required|integer',
            'intermediate_max' => 'required|integer',
            'low_intermediate_min' => 'required|integer',
            'low_intermediate_max' => 'required|integer',
            'advanced_min' => 'required|integer',
            'advanced_max' => 'required|integer',
        ]);
    
        // Lưu các giới hạn vào session hoặc cơ sở dữ liệu tùy nhu cầu
        session([
            'beginner_min' => $request->beginner_min,
            'beginner_max' => $request->beginner_max,
            'intermediate_min' => $request->intermediate_min,
            'intermediate_max' => $request->intermediate_max,
            'low_intermediate_min' => $request->low_intermediate_min,
            'low_intermediate_max' => $request->low_intermediate_max,
            'advanced_min' => $request->advanced_min,
            'advanced_max' => $request->advanced_max,
        ]);
    
        return redirect()->route('set.course'); // Điều hướng về trang đặt giới hạn khóa học
    }
    

    public function getCurrentUserCorrectAnswersCount()
    {   
        $userId = Auth::id(); // Lấy ID của người dùng đã đăng nhập
        $testId = session('test_id');

    // Đảm bảo testId tồn tại
    if (!$testId) {
        // Xử lý trường hợp testId không tồn tại (ví dụ: trả về lỗi hoặc thông báo)
        abort(404, 'Test ID not found in session');
    }

        $count = $this->userAnswerService->getCurrentUserCorrectAnswersCount($userId , $testId);
      //  dd($count);
        $course = $this->suggestCourseBasedOnScore($count); 
//dd($course);
        // Trả về view 'course' với các biến count, course, và courseId
        return view('course', [
            'count' => $count,
            'course' => $course,
            'courseId' => $course, // Sử dụng $courseId bằng giá trị $course
        ]);
    }

    public function suggestCourseBasedOnScore($score)
{
    // Lấy các giá trị tùy chỉnh từ session
    $beginner_min = session('beginner_min', 1);
    $beginner_max = session('beginner_max', 2);
    $intermediate_min = session('intermediate_min', 3);
    $intermediate_max = session('intermediate_max', 5);
    $low_intermediate_min = session('low_intermediate_min', 6);
    $low_intermediate_max = session('low_intermediate_max', 8);
    $advanced_min = session('advanced_min', 9);
    $advanced_max = session('advanced_max', 11);

    if ($score >= $beginner_min && $score <= $beginner_max) {
        return "Beginner (Sơ cấp 1)";
    } elseif ($score >= $intermediate_min && $score <= $intermediate_max) {
        return "High Beginner (Sơ cấp 2)";
    } elseif ($score >= $intermediate_max + 1 && $score <= $low_intermediate_min - 1) {
        return "Low Intermediate (Trung cấp 1)";
    } elseif ($score >= $low_intermediate_min && $score <= $low_intermediate_max) {
        return "Intermediate (Trung cấp 2)";
    } elseif ($score >= $low_intermediate_max + 1 && $score <= $advanced_min - 1) {
        return "Low Advanced (Cao cấp 1)";
    } elseif ($score >= $advanced_min && $score <= $advanced_max) {
        return "Advanced (Cao cấp 2)";
    } else {
        return "Không xác định";
    }
}
    public function show($course)
    {
        return view('show', compact('course'));
    }
}
