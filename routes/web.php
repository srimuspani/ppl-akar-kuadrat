<?php

use App\Http\Controllers\SquareController;
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
    return view('index');
});

// api to count square root of a number
Route::get('/api/square/{number}', [SquareController::class, 'square']);
Route::get('/api/sql/square/{number}', [SquareController::class, 'square_db']);
