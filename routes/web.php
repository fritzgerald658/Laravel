<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\TaskController;
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


// Route::get('/index', [PersonController::class, 'index'])->name('person.index');

// Route::get('/index/create', [PersonController::class, 'create'])->name('person.create');

// Route::post('/index', [PersonController::class, 'store'])->name('person.store');

// Route::get('/index/{user}/edit', [PersonController::class, 'edit'])->name('person.edit');

// Route::delete('/index/{user}/delete', [PersonController::class, 'delete'])->name('person.delete');

Route::get('/home', [TaskController::class, 'home'])->name('todo.home');

Route::get('/home/add', [TaskController::class, 'addTask'])->name('todo.add');

Route::post('/home', [TaskController::class, 'storeTask'])->name('todo.store');

Route::patch('/home/{task}', [TaskController::class, 'updateTask'])->name('todo.update');

Route::delete('/home/{task}', [TaskController::class, 'destroyTask'])->name('todo.destroy');
