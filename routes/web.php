<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUsersController;
use App\Http\Controllers\DashboardCoursesController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

//HomeController
Route::resource('', HomeController::class)->except('show');

//DashboardController
Route::resource('dashboard', DashboardController::class)->except('show');

//LoginController
Route::resource('login', LoginController::class)->except('show')->middleware('guest');

//RegisterController
Route::resource('register', RegisterController::class)->except('show')->middleware('guest');

//LogoutController
Route::get('logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');

//DashboardUsersController
Route::resource('dashboard/users', DashboardUsersController::class)->except('show');

//DashboardCoursesController
Route::resource('dashboard/courses', DashboardCoursesController::class)->except('show');