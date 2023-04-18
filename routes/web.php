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

Route::middleware(['guest'])->group(function () {
    //LoginController
    Route::resource('login', LoginController::class)->except('show')->middleware('guest'); 
    //RegisterController
    Route::resource('register', RegisterController::class)->except('show')->middleware('guest');
});

Route::middleware(['auth'])->group(function () {
    //LogoutController
    Route::get('logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');
});

Route::middleware(['auth', 'not_admin'])->group(function () {
    //MateriController
    Route::resource('materi', MateriController::class)->except('show');
    //QuizController
    Route::resource('quiz', QuizController::class)->except('show');
});

Route::middleware(['not_admin'])->group(function () {
    //HomeController
    Route::resource('', HomeController::class)->except('show')->middleware('not_admin');
});

Route::middleware(['admin'])->group(function () {
    //DashboardController
    Route::resource('dashboard', DashboardController::class)->except('show');
    //DashboardUsersController
    Route::resource('dashboard/users', DashboardUsersController::class);
    //DashboardCoursesController
    Route::get('dashboard/courses/getSlug', [DashboardCoursesController::class, 'createSlug'])->name('getSlug');
    Route::resource('dashboard/courses', DashboardCoursesController::class);
});
