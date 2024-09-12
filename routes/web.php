<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/dashboard', function () {
    if (session('is_admin')) {
        return view('dashboard');
    } else {
        return redirect()->route('login');
    }
})->name('dashboard');

Route::get('/tech', function () {
    if (session('is_admin') === false) {  // Check for tech user
        return view('tech');
    } else {
        return redirect()->route('login');
    }
})->name('tech');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/logouttech', [LoginController::class, 'logout'])->name('logouttech');



// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::post('/logouttech', [LoginController::class, 'logoutTech'])->name('logouttech');

