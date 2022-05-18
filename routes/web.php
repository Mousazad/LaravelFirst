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


Route::get('/hello', function () {
    return view('hello');
})->name('hello');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/books/index',[BookController::class, 'index'])->name('booksIndex');
Route::get('/books/show/{book}',[BookController::class, 'show'])->name('showBook');
Route::get('/books/delete/{book}',[BookController::class, 'destroy'])->name('delBook');
Route::post('/books/add',[BookController::class, 'store'])->name('storeBook');
Route::get('/books/edit/{book}',[BookController::class, 'edit'])->name('editBook');
Route::post('/books/update/{book}',[BookController::class, 'update'])->name('updateBook');
Route::get('/books/remove_author/{book}/{author}',[BookController::class, 'removeAuthor'])->name('remAuthor');
Route::post('/books/add_author/{book}',[BookController::class, 'addAuthor'])->name('addAuthorToBook');




Route::middleware(['auth'])->group(function () {
	Route::get('/authors/index',[AuthorController::class, 'index'])->name('authorsIndex');
	Route::get('/authors/show/{author}',[AuthorController::class, 'show'])->name('showAuthor');	Route::get('/authors/delete/{author}',[AuthorController::class, 'destroy'])->name('delAuthor');
});

Route::middleware(['auth','admin'])->group(function () {
	Route::post('/authors/add',[AuthorController::class, 'store'])->name('storeAuthor');
	Route::get('/authors/edit/{author}',[AuthorController::class, 'edit'])->name('editAuthor');
	Route::post('/authors/update/{author}',[AuthorController::class, 'update'])->name('updateAuthor');
});

Route::get('/test_sessions', function () {
	
	if(session()->exists('count') && session('count')==10)
		session()->forget('count');
	
	if(session()->missing('count'))
		session(['count' => 0]);
	else{
		//session(['count' => session('count')+1]);
		session()->increment('count');
	}
    return session('count');
});

