<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HorseController;
use App\Http\Controllers\RecoveryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;

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

Route::middleware('auth')->group(function () {
    Route::get('/', [HorseController::class, 'home'])->name('home');
    Route::get('/predict', [HorseController::class, 'predict'])->name('predict');
    Route::post('/predict', [HorseController::class, 'predictCreate'])->name('predictCreate');
    Route::get('/history', [HorseController::class, 'history'])->name('history');
    Route::get('/history/update/{id}', [HorseController::class, 'showUpdate'])->name('showUpdate');
    Route::post('/history/update', [HorseController::class, 'storeUpdate'])->name('storeUpdate');
    Route::post('/search_history', [HorseController::class, 'search_history'])->name('search_history');
    Route::get('/look', [HorseController::class, 'look'])->name('look');
    Route::get('/look/show/{id}', [HorseController::class, 'show'])->name('show');

    Route::post('/search_look', [HorseController::class, 'search_look'])->name('search_look');

    Route::get('/achievement', [RecoveryController::class, 'achievement'])->name('achievement');
    Route::post('/achievement/create', [RecoveryController::class, 'achieveCreate'])->name('achieveCreate');

    Route::get('/user', [UserController::class, 'showUser'])->name('showUser');

    Route::post('/horse/{id}/like', [LikeController::class, 'like'])->name('like');
    Route::post('/horse/{id}/notlike', [LikeController::class, 'notlike'])->name('notlike');
});

require __DIR__.'/auth.php';
