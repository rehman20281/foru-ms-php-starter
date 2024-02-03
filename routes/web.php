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
    ->middleware('authenticate_user');

Route::get('login', [\App\Http\Controllers\AuthController::class, 'index'])
    ->name('login')->middleware(\App\Http\Middleware\AuthLogin::class);

Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('logout')->middleware(\App\Http\Middleware\AuthLogin::class);
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])
    ->name('user-login')
    ->middleware(\App\Http\Middleware\AuthLogin::class);
Route::post('signup', [\App\Http\Controllers\AuthController::class, 'signup'])
    ->name('user-signup')->middleware(\App\Http\Middleware\AuthLogin::class);


Route::get('user', [\App\Http\Controllers\UserController::class, 'index'])
    ->middleware('authenticate_user')
    ->name('user_profile');

Route::get('thread', function () {
    return view('thread');
})->name('thread');

Route::get('new-thread', [\App\Http\Controllers\ThreadController::class, 'index'])
    ->name('new-thread')
    ->middleware('authenticate_user');

Route::post('create-thread', [\App\Http\Controllers\ThreadController::class, 'create'])
    ->name('create-thread')
    ->middleware('authenticate_user');

Route::post('create/post', [\App\Http\Controllers\PostController::class, 'create'])
    ->name('create.post')
    ->middleware('authenticate_user');

Route::get('thread/{id}', [\App\Http\Controllers\ThreadController::class, 'getThreadDetail'])
    ->name('thread.detail')
    ->middleware('authenticate_user');

