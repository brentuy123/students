<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
})->name('dashboard');



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


Route::get('/dashboard', [UserController::class, 'index'])->middleware('auth', 'verified')->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('users')->name('users.')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('index');              // Show user data
        Route::get('/add', 'create')->name('add.form');       // Show add form
        Route::post('/add', 'store')->name('add');            // Add data
        Route::get('/edit/{id}', 'edit')->name('edit.form');  // Show edit form
        Route::put('/edit/{id}', 'update')->name('edit');     // Edit data
        Route::delete('/delete/{id}', 'destroy')->name('delete'); // Delete data
    });
});

require __DIR__ . '/auth.php';
