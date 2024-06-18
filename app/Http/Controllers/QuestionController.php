<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\QuestionRepositoryInterface;

class QuestionController extends Controller
{
    protected $questionRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function showTestPage(Request $request)
    {
        $numQuestions = $request->get('questions', 10); // Mặc định là 10 câu hỏi
        $questions = $this->questionRepository->getQuestionsByNumQuestions($numQuestions);

        return view('Question', compact('questions'));
    }
}
