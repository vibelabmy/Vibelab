<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('demo');
});

Route::get('/demo', function () {
    return view('demo');
})->name('demo');

Route::get('/pakej', function () {
    return view('pakej');
})->name('pakej');

Route::get('/tentang-kami', function () {
    return view('tentang_kami');
})->name('tentang_kami');

Route::get('/hubungi-kami', function () {
    return view('hubungi_kami');
})->name('hubungi_kami');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
