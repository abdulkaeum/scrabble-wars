<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('users', [UserController::class, 'index'])->name('user.index');
Route::get('users/create', [UserController::class, 'create'])->name('user.create');
Route::get('users/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::patch('users/{user}', [UserController::class, 'update'])->name('user.update');
Route::post('users', [UserController::class, 'store'])->name('user.store');

Route::get('games', [GameController::class, 'index'])->name('game.index');
Route::get('games/create', [GameController::class, 'create'])->name('game.create');
Route::post('games', [GameController::class, 'store'])->name('game.store');
