<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
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
require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/books/index',[BookController::class, 'index'])->middleware(['auth'])->name('booksIndex');
Route::get('/books/show/{book}',[BookController::class, 'show'])->middleware(['auth'])->name('showBook');
Route::get('/books/delete/{book}',[BookController::class, 'destroy'])->middleware(['auth'])->name('delBook');
Route::post('/books/add',[BookController::class, 'store'])->middleware(['auth'])->name('storeBook');
Route::get('/books/edit/{book}',[BookController::class, 'edit'])->middleware(['auth'])->name('editBook');
Route::post('/books/update/{book}',[BookController::class, 'update'])->middleware(['auth'])->name('updateBook');

Route::get('/authors/index',[AuthorController::class, 'index'])->middleware(['auth'])->name('authorsIndex');
Route::get('/authors/show/{author}',[AuthorController::class, 'show'])->middleware(['auth'])->name('showAuthor');
Route::get('/authors/delete/{author}',[AuthorController::class, 'destroy'])->middleware(['auth'])->name('delAuthor');
Route::post('/authors/add',[AuthorController::class, 'store'])->middleware(['auth'])->name('storeAuthor');
Route::get('/authors/edit/{author}',[AuthorController::class, 'edit'])->middleware(['auth'])->name('editAuthor');
Route::post('/authors/update/{author}',[AuthorController::class, 'update'])->middleware(['auth'])->name('updateAuthor');



