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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post(
    '/posts',
    [PostController::class, 'create',],
)->name('post.create');

Route::middleware('auth:sanctum')->get(
    '/posts/paginate/{number}',
    [PostController::class, 'paginate',],
)->name('post.paginate');


Route::middleware('auth:sanctum')->get(
    '/posts/{uuid}',
    [PostController::class, 'findOne',],
)->name('post.findOne');
