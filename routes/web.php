<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app.landing');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/profile/{id}', [ProfileController::class, 'index']);
Route::put('/profile/{id}', [ProfileController::class, 'update']);

Route::get('/donate', function () {
    return view('app.donate');
});

Route::get('/donate-detail', function () {
    return view('app.donate-detail');
});

Route::get('/admin/dashboard', function () {
    return view('app.admin.dashboard');
});

Route::get('/admin/volunteer', function () {
    return view('app.admin.volunteer');
});

Route::get('/admin/volunteer-detail', function () {
    return view('app.admin.detail-volunteer');
});

Route::get('/volunteer/dashboard', function () {
    return view('app.volunteer.dashboard');
});
