<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('/', [TodoController::class, 'index']);

Route::get('create', [TodoController::class, 'create']);
Route::post('store-data', [TodoController::class, 'store']);

Route::get('details/{todo}', [TodoController::class, 'details']);
Route::get('details/edit/{todo}', [TodoController::class, 'edit']);
Route::post('update/{todo}', [TodoController::class, 'update']);

Route::get('delete/{todo}', [TodoController::class, 'delete']);

Route::get('signup', [TodoController::class, 'signup']);
Route::post('reg', [TodoController::class, 'register']);

Route::get('loginpage', [TodoController::class, 'loginpage']);
Route::post('login', [TodoController::class, 'login']);

Route::get('logout', [TodoController::class, 'logout']);