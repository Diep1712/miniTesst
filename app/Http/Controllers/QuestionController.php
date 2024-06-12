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

    public function showTest()
    {
        $questions = $this->questionRepository->getQuestions(10);
        return view('Question', ['questions' => $questions]);
    }

}