<?php

use App\Presentation\UI\Web\Frontend\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;



Route::prefix('api')->post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');
