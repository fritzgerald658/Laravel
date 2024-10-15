<?php

use App\Http\Controllers\PersonController;
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


Route::get('/index', [PersonController::class, 'index'])->name('person.index');

Route::get('/index/create', [PersonController::class, 'create'])->name('person.create');

Route::post('/index', [PersonController::class, 'store'])->name('person.store');

Route::get('/index/{user}/edit', [PersonController::class, 'edit'])->name('person.edit');

Route::delete('/index/{user}/delete', [PersonController::class, 'delete'])->name('person.delete');
