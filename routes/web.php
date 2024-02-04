<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\ThreadController::class, 'getThreads'])
    ->name('threads')
    ->middleware(\App\Http\Middleware\AuthMiddleware::class);

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'index'])
    ->name('login')
    ->middleware(\App\Http\Middleware\AuthLogin::class);

Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('logout');

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])
    ->name('user-login')
    ->middleware(\App\Http\Middleware\AuthMiddleware::class);
;
Route::post('/signup', [\App\Http\Controllers\AuthController::class, 'signup'])
    ->name('user-signup')
    ->middleware(\App\Http\Middleware\AuthLogin::class);


Route::get('/user', [\App\Http\Controllers\UserController::class, 'index'])
    ->middleware(\App\Http\Middleware\AuthMiddleware::class)
    ->name('user_profile');

Route::get('/thread', function () {
    return view('thread');
})->name('thread');

Route::get('/new-thread', [\App\Http\Controllers\ThreadController::class, 'index'])
    ->name('new-thread')
    ->middleware(\App\Http\Middleware\AuthMiddleware::class);

Route::post('/create-thread', [\App\Http\Controllers\ThreadController::class, 'create'])
    ->name('create-thread')
    ->middleware(\App\Http\Middleware\AuthMiddleware::class);

Route::post('/create/post', [\App\Http\Controllers\PostController::class, 'create'])
    ->name('create.post')
    ->middleware(\App\Http\Middleware\AuthMiddleware::class);

Route::get('/thread/{id}', [\App\Http\Controllers\ThreadController::class, 'getThreadDetail'])
    ->name('thread.detail')
    ->middleware(\App\Http\Middleware\AuthMiddleware::class);
