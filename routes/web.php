<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Redirect;
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

Route::get('/', fn () => Redirect::route('login'));
Route::get('/main', MainController::class)->middleware(['auth'])->name('main');
Route::get('/transactions', TransactionController::class)->middleware(['auth'])->name('transactions');

require __DIR__.'/auth.php';
