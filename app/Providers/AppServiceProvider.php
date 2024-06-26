<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\QuestionRepositoryInterface;
use App\Repositories\QuestionRepository;
use App\Repositories\UserAnswerRepositoryInterface;
use App\Repositories\UserAnswerRepository;
use App\Repositories\CourseRepository;
use App\Repositories\CourseRepositoryInterface;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
        $this->app->bind(UserAnswerRepositoryInterface::class, UserAnswerRepository::class);
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
