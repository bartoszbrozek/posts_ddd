<?php

use App\Presentation\UI\Web\Frontend\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('')->group(function () {
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get(
        '/posts',
        [PostController::class, 'index',],
    )->name('post.index');

    Route::middleware('auth:api')->post(
        '/posts',
        [PostController::class, 'create',],
    )->name('post.create');
});
