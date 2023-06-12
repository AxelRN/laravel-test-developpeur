<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlageController;
use App\Http\Controllers\ContactController;

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

Route::get('/', [PlageController::class, 'index']);

Route::resource('/plages', PlageController::class);

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/send-mail', [ContactController::class, 'submit'])->name('contact.submit');

