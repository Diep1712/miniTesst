<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CourseController;





Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::post('TestOnline', function () {
    return view('TestOnline');
})->name('TestOnline');
Route::get('TestOnline', function () {
    return view('TestOnline');
})->name('TestOnline');


Route::get('/quiz', [QuestionController::class, 'submitQuiz'])->name('show.quiz');
Route::post('/quiz', [ResultController::class, 'submitQuiz'])->name('submit.quiz');
Route::post('/submit-quiz', [ResultController::class, 'submitQuiz'])->name('submit.quiz');
Route::get('/course/{course}', [CourseController::class, 'show'])->name('course.show');





Route::get('/test', [QuestionController::class, 'showTest']);
Route::post('/submit-test', [ResultController::class, 'submitTest']);
