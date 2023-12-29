<?php

use App\Http\Controllers\BracketController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\DogContestController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('dogs', DogController::class);
Route::resource('contests', ContestController::class);
Route::resource('brackets', BracketController::class);
Route::resource('participants', DogContestController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
