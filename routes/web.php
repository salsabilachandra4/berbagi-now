<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app.landing');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', function () {
return view('auth.register');
});

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
