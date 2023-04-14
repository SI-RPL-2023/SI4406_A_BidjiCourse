<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MateriController;
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

//HomeController
Route::resource('', HomeController::class)->except('show')->middleware('not_admin');

//MateriController
Route::resource('materi', MateriController::class)->except('show')->middleware('not_admin');

//LoginController
Route::resource('login', LoginController::class)->except('show')->middleware('guest');

//RegisterController
Route::resource('register', RegisterController::class)->except('show')->middleware('guest');

//LogoutController
Route::get('logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');

//DashboardController
Route::resource('dashboard', DashboardController::class)->except('show')->middleware('admin');

//DashboardUsersController
Route::resource('dashboard/users', DashboardUsersController::class)->except('show')->middleware('admin');

//DashboardCoursesController
Route::get('dashboard/courses/getSlug', [DashboardCoursesController::class, 'createSlug'])->middleware('admin')->name('getSlug');
Route::resource('dashboard/courses', DashboardCoursesController::class)->middleware('admin');