<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', [AuthController::class, 'me'])
->middleware('auth:sanctum')
->name('user');

Route::post('/login', [AuthController::class, 'login'])
->name('login');

Route::post('/request-access', [AccessController::class, 'requestAccess'])
->name('request-access');
