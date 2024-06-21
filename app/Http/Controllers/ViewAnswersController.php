<?php

namespace App\Http\Controllers;

use App\Repositories\QuestionRepositoryInterface;
use App\Repositories\UserAnswerRepositoryInterface;
use App\Services\ResultService;
use Illuminate\Support\Facades\Auth;

class ViewAnswersController extends Controller
{
    protected $questionRepository;
    protected $userAnswerRepository;
    protected $resultService;

    public function __construct(
        QuestionRepositoryInterface $questionRepository,
        UserAnswerRepositoryInterface $userAnswerRepository,
        ResultService $resultService
    ) {
        $this->questionRepository = $questionRepository;
        $this->userAnswerRepository = $userAnswerRepository;
        $this->resultService = $resultService;
    }

    public function reviewAnswers()
{
    $userId = Auth::id(); // Lấy ID của người dùng đã đăng nhập
    $answers = []; // Khai báo biến $answers để tránh lỗi Undefined variable

    // Gọi phương thức để lưu câu trả lời của người dùng và nhận lại testId
    $testId = $this->resultService->saveAnswersToDatabase($answers);
    $testId=$testId-1;
//dd($testId);
    // Lấy danh sách câu hỏi mà người dùng đã trả lời trong bài kiểm tra có test_id
    $questions = $this->questionRepository->getQuestionsByUserId($userId, $testId);

    // Lấy danh sách câu trả lời của người dùng cho các câu hỏi này
    $userAnswers = $this->userAnswerRepository->getUserAnswersByUserId($userId)->pluck('user_answer', 'question_id')->toArray();

    // Truyền dữ liệu đến view
    return view('view_answers', [
        'questions' => $questions,
        'userAnswers' => $userAnswers,
    ]);
}

}
