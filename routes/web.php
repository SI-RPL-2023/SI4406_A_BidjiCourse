<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUsersController;
use App\Http\Controllers\DashboardCoursesController;
use App\Http\Controllers\DashboardQuizzesController;
use App\Http\Controllers\DashboardCategoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::fallback(function () {
//     return redirect(route('index'));
// });

Route::middleware(['guest'])->group(function () {
    //LoginController
    Route::resource('login', LoginController::class)->except('show'); 
    //RegisterController
    Route::resource('register', RegisterController::class)->except('show');
});

Route::middleware(['auth'])->group(function () {
    //LogoutController
    Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'not_admin'])->group(function () {
    //MateriController
    Route::resource('materi', MateriController::class);
    //QuizController
    Route::resource('quiz', QuizController::class);
    Route::get('quiz/result/{ulid}', [QuizController::class, 'result'])->name('quiz.result');
    Route::post('quiz/check/{quiz_id}', [QuizController::class, 'preSubmitCheck'])->name('quiz.check');
    Route::post('quiz/flag/{quiz_id}/{question_id}', [QuizController::class, 'flag'])->name('quiz.flag');
});

Route::middleware(['not_admin'])->group(function () {
    //HomeController
    Route::resource('', HomeController::class)->except('show');
});

Route::middleware(['admin'])->group(function () {
    //DashboardController
    Route::resource('dashboard', DashboardController::class)->except('show');
    Route::post('getSlug', [DashboardController::class, 'createSlug'])->name('getSlug');
    //DashboardUsersController
    Route::resource('dashboard/users', DashboardUsersController::class);
    //DashboardQuizzesController
    Route::resource('dashboard/quizzes', DashboardQuizzesController::class);
    Route::get('dashboard/quizzes/{quiz}/questions', [DashboardQuizzesController::class, 'showQuestions'])->name('quizzes.showQuestions');
    Route::post('dashboard/quizzes/question', [DashboardQuizzesController::class, 'storeQuestions'])->name('quizzes.storeQuestions');
    Route::patch('dashboard/quizzes/question/{quizQuestion}', [DashboardQuizzesController::class, 'updateQuestions'])->name('quizzes.updateQuestions');
    Route::delete('dashboard/quizzes/question/{quizQuestion}', [DashboardQuizzesController::class, 'destroyQuestions'])->name('quizzes.destroyQuestions');
    //DashboardCoursesController
    Route::resource('dashboard/courses', DashboardCoursesController::class);
    //DashboardCategoriesController
    Route::resource('dashboard/categories', DashboardCategoriesController::class);
});