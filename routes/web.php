<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/note') -> name('dashboard');

// 添加两个middleware，这两个middlware是laravel提供
// auth的作用是：验证用户是否登陆了；
// verified的作用是：验证用户的邮箱是否验证了；
// 如果通过了这两个middleware，则可以访问里面的api；
Route::middleware(['auth', 'verified']) -> group(function() {
    Route::resource('note', NoteController::class);
});

// 同理，只有登陆的用户才可以访问里面的api；
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
