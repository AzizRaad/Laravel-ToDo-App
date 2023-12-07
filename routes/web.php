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

Route::get('create', [TodoController::class, 'create'])->middleware('mbli');
Route::post('store-data', [TodoController::class, 'store'])->middleware('mbli');

Route::get('details/{todo}', [TodoController::class, 'details'])->middleware('mbli');
Route::get('details/edit/{todo}', [TodoController::class, 'edit'])->middleware('mbli');
Route::post('update/{todo}', [TodoController::class, 'update'])->middleware('mbli');

Route::get('delete/{todo}', [TodoController::class, 'delete'])->middleware('mbli');

Route::get('signup', [TodoController::class, 'signup']);
Route::post('reg', [TodoController::class, 'register']);

Route::get('loginpage', [TodoController::class, 'loginpage'])->name('login');
Route::post('login', [TodoController::class, 'login']);

Route::get('logout', [TodoController::class, 'logout'])->middleware('mbli');