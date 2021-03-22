<?php

use App\Presentation\UI\Web\Frontend\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Presentation\UI\Web\Frontend\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::prefix('api')->post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('guest');

Route::prefix('api')->post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');
