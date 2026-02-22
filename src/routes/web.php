<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
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

Route::get('/', [AuthController::class, 'index']);

Route::middleware('auth')->prefix('contacts')->name('contacts.')->group(function () {
  Route::resource('/', ContactController::class)->only('index', 'store');

  Route::post('confirm', [ContactController::class, 'confirm'])->name('confirm');
  Route::post('back', [ContactController::class, 'back'])->name('back');
  Route::get('thanks', [ContactController::class, 'thanks'])->name('thanks');
});
