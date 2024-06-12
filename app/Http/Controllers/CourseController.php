<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show($course)
    {
        // Logic để hiển thị trang khóa học dựa trên tên khóa học
        // Ví dụ: trả về view với thông tin chi tiết của khóa học
        return view('show', ['course' => $course]);
    }
}
