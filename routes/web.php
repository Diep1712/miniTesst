<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\UserAnswerController;
use App\Http\Controllers\ViewAnswersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/test-page', [QuestionController::class, 'showTestPage'])->name('test-page');

Route::get('/show-course/{course}', [UserAnswerController::class, 'showCourse'])->name('show-course');
Route::get('/courses/{course}', [UserAnswerController::class, 'show'])->name('show-course');

Route::get('/view-answers', [ViewAnswersController::class, 'reviewAnswers'])->name('view-answers');

Route::post('/admin/update-questions', [AdminController::class, 'updateQuestions'])->name('admin.updateQuestions');
Route::get('/admin', [AdminController::class, 'admin'])->name('admin.index');
Route::post('/admin/manage-results', [AdminController::class, 'adminManageResults'])->name('admin.manage-results');
Route::get('/admin/manage-results', [AdminController::class, 'adminManageResults'])->name('admin.manage-results');
Route::post('/admin/manage-courses', [AdminController::class, 'adminManageCourses'])->name('admin.manage-courses');
Route::get('/admin/manage-courses', [AdminController::class, 'adminManageCourses'])->name('admin.manage-courses');

Route::get('/review-answers/{testId}', [ViewAnswersController::class, 'reviewAnswers'])->name('review.answers');

Route::post('/view-result', [ResultController::class, 'showResult'])->name('submit');

Route::get('/user/current/correct-answers', [UserAnswerController::class, 'getCurrentUserCorrectAnswersCount'])->name('showcourse');
Route::post('/users', [UserAnswerController::class, 'getUserTests'])->name('input.process');
Route::get('/users', [UserAnswerController::class, 'getUserTests'])->name('input.process');

Route::get('/user/{userId}/tests/{testId}/review', [UserAnswerController::class, 'reviewTest'])->name('user.tests.review');

Route::post('/setCourseLimits', [UserAnswerController::class, 'setCourseLimits'])->name('set.course');
Route::get('/setCourseLimits', [UserAnswerController::class, 'setCourseLimits'])->name('set.course');
