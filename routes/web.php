<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BracketController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\ContestDogController;
use App\Http\Controllers\DogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// HOME
Route::get('/', [DogController::class, 'index'])
    ->name('default');

// RESOURCEFUL CONTROLLERS
Route::resource('dogs', DogController::class);
Route::resource('contests', ContestController::class);
Route::resource('brackets', BracketController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// JOIN A CONTEST


// ADMIN DASHBOARD
Route::get('/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth', 'isAdmin'])
    ->name('dashboard');