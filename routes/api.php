<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// API v1 routes
Route::prefix('v1')->group(function () {

    // Books routes
    Route::prefix('books')->group(function () {

        Route::get('', [BookController::class, 'api_index']);
        Route::get('/{isbn}', [BookController::class, 'api_one_book_by_isbn']);
        Route::get('/author/{author_id}', [BookController::class, 'api_all_books_by_author']);
        Route::post('', [BookController::class, 'api_store']);
        Route::delete('/{isbn}', [BookController::class, 'api_destroy']);

    });

    // Authors routes
    Route::prefix('authors')->group(function () {

        Route::get('', [AuthorController::class, 'api_index']);

    });

});
