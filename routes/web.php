<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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

Route::get('/step/1', [OrderController::class, 'step1'])->name('step_1');
Route::get('/step/2', [OrderController::class, 'step2'])->name('step_2');
Route::get('/step/3', [OrderController::class, 'step3'])->name('step_3');
Route::get('/preview', [OrderController::class, 'preview'])->name('preview');
Route::get('/submit', [OrderController::class, 'submit'])->name('submit');

