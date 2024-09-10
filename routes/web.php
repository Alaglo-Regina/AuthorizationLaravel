<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.register');
});

Route::get('login', function () {
    return view('auth.login');
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware([
    IsAdminMiddleware::class
])->group(function() {
    Route::get('dashboardAdmin', function () {
        return view('dashboardAdmin');
    })->name('dashboardAdmin');
});

Route::post('/register', [AuthController::class, 'register'])->name('registration');
Route::post('/login', [AuthController::class, 'login'])->name('login');
