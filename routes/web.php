<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthorController;

// Index route
Route::get('/', [LibraryController::class, 'index'])->name('index');

// Generate Report route
Route::get('/report', [LibraryController::class, 'report'])->name('report');

// Authors routes
Route::name('authors.')->prefix('authors')->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->name('index');
    Route::get('/search', [AuthorController::class, 'search'])->name('search');
    Route::get('/create', [AuthorController::class, 'create'])->name('create');
    Route::post('/store', [AuthorController::class, 'store'])->name('store');
    Route::get('/edit/${author}', [AuthorController::class, 'edit'])->name('edit');
    Route::post('/update/${author}', [AuthorController::class, 'update'])->name('update');
    Route::get('//delete/${author}', [AuthorController::class, 'destroy'])->name('destroy');
});

// Locations routes
Route::name('locations.')->prefix('locations')->group(function () {
    Route::get('/', [LocationController::class, 'index'])->name('index');
    Route::get('/create', [LocationController::class, 'create'])->name('create');
    Route::post('/store', [LocationController::class, 'store'])->name('store');
    Route::get('//delete/${location}', [LocationController::class, 'destroy'])->name('destroy');
    Route::get('/${location}/books', [LocationController::class, 'show_books'])->name('show_books');
});

// Books routes
Route::name('books.')->prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('index');
    Route::get('/search', [BookController::class, 'search'])->name('search');
    Route::get('/${book}', [BookController::class, 'show'])->name('show');
    Route::get('/create', [BookController::class, 'create'])->name('create');
    Route::post('/store', [BookController::class, 'store'])->name('store');
    Route::get('/edit/${book}', [BookController::class, 'edit'])->name('edit');
    Route::post('/update/${book}', [BookController::class, 'update'])->name('update');
    Route::get('//delete/${book}', [BookController::class, 'destroy'])->name('destroy');
});
