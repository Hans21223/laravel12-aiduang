<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return redirect()->route('news.index');
})->name('home');

// --- News Routes ---
// จัดกลุ่ม Route ที่ต้อง login และเป็น admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/manage', [NewsController::class, 'manage'])->name('news.manage');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
});

// Route ที่ไม่ต้อง login ก็เข้าได้
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');


// --- Breeze Routes ---
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

// --- Volt Routes ---
Volt::route('/settings/profile', 'settings.profile')
    ->middleware('auth')
    ->name('settings.profile');

Volt::route('/settings/password', 'settings.password')
    ->middleware('auth')
    ->name('settings.password');