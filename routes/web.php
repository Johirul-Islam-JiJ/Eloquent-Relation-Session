<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\TestController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', [TestController::class, 'test']);

Route::get('contact-us', [TestController::class, 'contactUs']);
Route::get('about-us', [TestController::class, 'aboutUs']);
Route::get('home', [TestController::class, 'home']);

Route::resource('books', BookController::class);
Route::get('books/{book}/assign-author', [BookController::class, 'assignAuthorForm'])->name('books.assign-author.form');
Route::post('books/{book}/assign-author', [BookController::class, 'assignAuthor'])->name('books.assign-author');
Route::resource('publishers', PublisherController::class);
Route::resource('authors', AuthorController::class);
