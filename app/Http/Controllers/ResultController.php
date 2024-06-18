<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ResultService;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    protected $resultService;

    public function __construct(ResultService $resultService)
    {
        $this->resultService = $resultService;
    }

    public function showResult(Request $request)
    {
        $userId = Auth::id();
        $answers = $request->input('answers'); // Giả sử bạn nhận được câu trả lời từ request

        $this->resultService->saveAnswersToDatabase($answers);
     
        $result = $this->resultService->calculateResult($userId);
        return view('result', ['result' => $result]);
    }
    public function calculateResult() {
        $userId = Auth::id();
        $result = $this->resultService->calculateResult($userId);
        // Xử lý kết quả, ví dụ hiển thị lên view
     
        return view('result', ['result' => $result]);
    }
}
