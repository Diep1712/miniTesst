<?php
namespace App\Http\Controllers;

use App\Repositories\QuestionRepositoryInterface;
use App\Repositories\UserAnswerRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ViewAnswersController extends Controller
{
    protected $questionRepository;
    protected $userAnswerRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository, UserAnswerRepositoryInterface $userAnswerRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->userAnswerRepository = $userAnswerRepository;
    }

    public function reviewAnswers()
    {
        $userId = Auth::id(); // Lấy ID của người dùng đã đăng nhập
            
        // Lấy danh sách câu hỏi mà người dùng đã trả lời
        $questions = $this->questionRepository->getQuestionsByUserId($userId);

        // Lấy danh sách câu trả lời của người dùng cho các câu hỏi này
        $userAnswers = $this->userAnswerRepository->getUserAnswersByUserId($userId)->pluck('user_answer', 'question_id')->toArray();
      //  dd($userAnswers);
        // Truyền dữ liệu đến view
        return view('view_answers', [
            'questions' => $questions,
            'userAnswers' => $userAnswers,
        ]);
       
    }
}
