<?php

use App\Http\Controllers\BirthdayController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('demo');
});

// route untuk demo 1 //

Route::get('/demo', function () {
    return view('demo');
})->name('demo');

Route::get('/pakej', function () {
    return view('pakej');
})->name('pakej');

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/tentang-kami', function () {
    return view('tentang_kami');
})->name('tentang_kami');

Route::get('/hubungi-kami', function () {
    return view('hubungi_kami');
})->name('hubungi_kami');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// route untuk middleware and auth //

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// route untuk demo 2 //

Route::get('/demo2', function () {
    return view('demo2');
})->name('demo2');

Route::middleware('guest')->group(function () {
    Route::get('/untukmu', [BirthdayController::class, 'create'])->name('birthday.login');
    Route::post('/untukmu', [BirthdayController::class, 'store'])
        ->middleware('throttle:5,1')
        ->name('birthday.login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/untukmu/kad', [BirthdayController::class, 'show'])->name('birthday.card');
    Route::post('/untukmu/logout', [BirthdayController::class, 'destroy'])->name('birthday.logout');
});

require __DIR__.'/auth.php';
