<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\ShortLinkController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('links', ShortLinkController::class);
});

// Маршрут для редиректа по короткой ссылке (исключая системные пути)
Route::get('/{short_code}', [ShortLinkController::class, 'redirect'])
    ->where('short_code', '^(?!login$|register$|logout$|dashboard$|profile$)[A-Za-z0-9]+');

require __DIR__.'/auth.php';
