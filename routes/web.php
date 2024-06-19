<?php

use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['auth', IsAdminMiddleware::class]
], function () {
    Route::view('dashboard', 'admin.dashboard')
    ->name('dashboard');

    Route::view('user/create', 'admin.user.create')
    ->name('user.create');
});

Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    'namespace' => 'User',
    'middleware' => ['auth']
], function () {
    Route::view('dashboard', 'user.dashboard')
    ->name('dashboard');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
