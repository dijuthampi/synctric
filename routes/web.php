<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth','verified'])->group(function () {
    Route::get('/libraries', [App\Http\Controllers\LibraryController::class, 'index'])->name('library');
    Route::get('/library/{library}', [App\Http\Controllers\LibraryController::class, 'libraryBooks'])->name('libraryBook');
    Route::middleware(['BookControl'])->group(function (){
        Route::get('/addBook', [App\Http\Controllers\BookController::class, 'index'])->name('book');
        Route::post('/addBook', [App\Http\Controllers\BookController::class, 'add'])->name('book');
    });
});