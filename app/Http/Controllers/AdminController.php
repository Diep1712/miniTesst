<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CourseRepositoryInterface;

class AdminController extends Controller
{
    

    public function updateQuestions(Request $request)
    {
        // Validate the input
        $request->validate([
            'num_questions' => 'required|integer|min:1',
        ]);

        // Store the number of questions in session
        session(['num_questions' => $request->input('num_questions')]);

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Cập nhật số lượng câu hỏi thành công!');
    }

    public function showcourse ()
    {
        return view ('course');
    }
    protected $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function index()
    {  
        $courses = $this->courseRepository->all();
        return view('admin_course', compact('courses'));
    }

   
}
