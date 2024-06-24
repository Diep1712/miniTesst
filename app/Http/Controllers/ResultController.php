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
     
        // $result = $this->resultService->calculateResult($userId);
        return view('result');
    }
  
  public function showResultPage()
  { 
    return view('result');

  }
}
