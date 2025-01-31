<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('pages.library.index', ['books' => $books]);
    }

    public function report()
    {
        $filename = date('Y-m-d') . '.pdf';

        $books = Book::all();

        return PDF::loadView('pdf.reports', ['books' => $books, 'filename' => $filename])
            ->setOption('lowquality', false)
            ->inline($filename);
    }
}
