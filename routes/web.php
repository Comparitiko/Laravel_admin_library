<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LocationController;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthorController;

// Index route
Route::get('/', [AuthorController::class, 'index'])->name('index');

// Generate Report route
Route::get('/report', function () {
    $filename = date('Y-m-d') . '.pdf';

    return PDF::loadView('pdf.reports', ['filename' => $filename])
        ->setOption('lowquality', false)
        ->inline($filename);
})->name('pdf');

// Authors routes
Route::name('authors.')->prefix('authors')->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->name('index');
    Route::get('/create', [AuthorController::class, 'create'])->name('create');
    Route::post('/store', [AuthorController::class, 'store'])->name('store');
    Route::get('/edit/${author}', [AuthorController::class, 'edit'])->name('edit');
    Route::post('/update/${author}', [AuthorController::class, 'create'])->name('update');
    Route::get('//delete/${author}', [AuthorController::class, 'destroy'])->name('destroy');
});

// Locations routes
Route::name('locations.')->prefix('locations')->group(function () {
    Route::get('/', [LocationController::class, 'index'])->name('index');
    Route::get('/create', [LocationController::class, 'create'])->name('create');
    Route::post('/store', [LocationController::class, 'store'])->name('store');
    Route::get('/edit/${author}', [LocationController::class, 'edit'])->name('edit');
    Route::post('/update/${author}', [LocationController::class, 'create'])->name('update');
    Route::get('//delete/${author}', [LocationController::class, 'destroy'])->name('destroy');
});

Route::name('books.')->prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('index');
    Route::get('/create', [BookController::class, 'create'])->name('create');
    Route::post('/store', [BookController::class, 'store'])->name('store');
    Route::get('/edit/${book}', [BookController::class, 'edit'])->name('edit');
    Route::post('/update/${book}', [BookController::class, 'create'])->name('update');
    Route::get('//delete/${book}', [BookController::class, 'destroy'])->name('destroy');
});
