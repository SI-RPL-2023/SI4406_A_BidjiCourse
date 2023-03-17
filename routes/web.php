<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('landing-page', [
        'title' => 'Selamat Datang di Bidji Course'
    ]);
})->name('landing-page');

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Dashboard'
    ]);
})->name('dashboard');

Route::get('/dashboard/courses', function () {
    return view('dashboard.courses', [
        'title' => 'Dashboard: Courses'
    ]);
})->name('courses');