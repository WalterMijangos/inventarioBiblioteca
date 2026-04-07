<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

Route::resource('books', BookController::Class);

Route::resource('authors', AuthorController::Class);

Route::get('/', function () {
    return view('welcome');
});
