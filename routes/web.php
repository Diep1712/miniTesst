<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ViewAnswersController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\UserAnswerController;






Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/register', [UserController::class, 'showRegistrationForm']);
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');


Route::get('/test-page', [QuestionController::class, 'showTestPage'])->name('test-page');







Route::get('/show-course/{course}', [UserAnswerController::class, 'showCourse'])->name('show-course');
Route::get('/courses/{course}', [UserAnswerController::class, 'show'])->name('show-course');

Route::get('viewanswers}', [ViewAnswersController::class, 'reviewAnswers'])->name('view-answers');

Route::post('/admin/update-questions', [AdminController::class, 'updateQuestions'])->name('admin.updateQuestions');

Route::get('/review-answers/{testId}', [ViewAnswersController::class, 'reviewAnswers'])->name('review.answers');

Route::post('/view-result', [ResultController::class, 'showResult'])->name('submit');

Route::get('/user/current/correct-answers', [UserAnswerController::class, 'geturrentUserCorrectAnswersCount'])->name('showcourse');
// Route::get('/user/current/correct-answers', [ResultController::class, 'getCurrentUserCorrectAnswersCount'])->name('showcourse');
Route::get('/admin_course',[AdminController::class,'index']);
Route::post('/users', [UserAnswerController::class, 'getUserTests'])->name('input.process');
Route::get('/users', [UserAnswerController::class, 'getUserTests'])->name('input.process');


Route::get('/user/{userId}/tests/{testId}/review', [UserAnswerController::class, 'reviewTest'])->name('user.tests.review');

Route::get('/editPoint', [UserAnswerController::class, 'EditPoint']);
Route::post('/editPoint', [UserAnswerController::class, 'EditPoint']);
Route::post('/setCourseLimits', [UserAnswerController::class, 'setCourseLimits'])->name('set.course');
Route::get('/setCourseLimits', [UserAnswerController::class, 'setCourseLimits'])->name('set.course');

