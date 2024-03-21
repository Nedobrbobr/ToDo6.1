<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('task')->as('task.')->controller(TaskController::class)->middleware(['auth', 'verified'])->group( function() {
    Route::get('new', function () { return view('task.new'); })->name('new');
    Route::post('create', 'create')->name('create');
    Route::get('list', function () { return view('task.list'); })->name('list');
    Route::get('completed', function () { return view('task.completed'); })->name('completed');
    Route::put('complete', 'complete')->name('complete');
    Route::get('search', function () { return view('task.search'); })->name('search');
    Route::get('find', 'find')->name('find');
});

require __DIR__.'/auth.php';
