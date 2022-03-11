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

Route::group(['middleware' => ['guest'], 'prefix' => 'auth', 'as' => 'auth.'], function () {
    //Login.
});

//Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('index');
    });
//});

