<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('message', MessageController::class, []);


Route::get('/group-chat', [ChatController::class, 'groupChat'])->name('groupChat');
Route::get('/channel-chat/{id}', [ChatController::class, 'channelChat'])->name('channelChat');
Route::get('/private-chat/{id}', [ChatController::class, 'privateChat'])->name('privateChat');

require __DIR__ . '/auth.php';
require __DIR__ . '/chat.php';
