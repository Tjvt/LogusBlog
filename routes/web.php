<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    $data = ['body'=>'lala'];
    return view('home', $data);
});

Route::get('/games', function () {
    return view('games.index');
});

Route::get('/games/space-shooter', function () {
    return view('games.space-shooter');
});

// Blog Routes - KORRIGIERT
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/search', [BlogController::class, 'search'])->name('blog.search');
Route::get('/blog/category/{category}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Member Routes
Route::get('/members', [MemberController::class, 'index'])->name('members.index');
Route::get('/members/{user}', [MemberController::class, 'show'])->name('members.show');

// Auth-protected Member Routes
Route::middleware('auth')->group(function () {
    Route::post('/members/{user}/challenge', [MemberController::class, 'challenge'])->name('members.challenge');
    Route::get('/profile', [MemberController::class, 'profile'])->name('profile');
    Route::put('/profile', [MemberController::class, 'updateProfile'])->name('profile.update');
});
