<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::get('/create', [BookController::class, 'create']);

Route::get('/', [BookController::class, 'index']);

Route::get('/{book}', [BookController::class, 'info']);

Route::post('/edit/{book}', [BookController::class, 'update']);

Route::delete('/delete/{book}', [BookController::class, 'delete']);

Route::post('/create', [BookController::class, 'save']);
