<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('home');

Route::get('/books', [BookController::class, 'index'])->name('books');
Route::get('/genres', [GenreController::class, 'index'])->name('genres');
Route::get('/authors', [AuthorController::class, 'index'])->name('authors');
