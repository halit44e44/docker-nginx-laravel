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
/*
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('index');
        Route::get('/serverSideDataTable', [\App\Http\Controllers\UserController::class, 'serverSideDataTable'])->name('serverSideDataTable');
    });

    Route::group(['prefix' => 'colors', 'as' => 'colors.'], function () {
        Route::get('/', [\App\Http\Controllers\ColorController::class, 'index'])->name('index');
    });
});*/


Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');

Route::prefix('users')
    ->name('users.')
    ->controller(\App\Http\Controllers\UserController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/serverSideDataTable', 'serverSideDataTable')->name('serverSideDataTable');
    });

Route::prefix('colors')
    ->name('colors.')
    ->controller(\App\Http\Controllers\ColorController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });

