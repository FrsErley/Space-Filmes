<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DemoCController;
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
use App\Http\Controllers\EventController;



Route::get('/', [EventController::class, 'index']);

Route::get('genre/{genreId}', [EventController::class, 'genreMovie']);

Route::get('/movie/{movie}', [EventController::class, 'show']);

Route::get('/telafilme', [EventController::class, 'telafilme'])->middleware('auth');

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');
  
Route::get('/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::put('/update/{id}', [EventController::class,'update'])->middleware('auth');


