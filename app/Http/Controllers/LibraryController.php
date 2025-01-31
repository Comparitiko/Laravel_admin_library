<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(20);
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

    public function search(Request $request)
    {
        $books = Book::with(['author', 'location'])
            ->where('state', 'like', '%' . $request->state . '%')
            ->where('title', 'like', '%' . $request->title . '%')
            ->whereHas('author', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->author . '%');
            })
            ->whereHas('location', function ($query) use ($request) {
                $query->where('library_name', 'like', '%' . $request->location . '%');
            })
            ->paginate(20);

        return view('pages.library.index', [
            'books' => $books,
            'author' => $request->author,
            'title' => $request->title,
            'state' => $request->state,
            'location' => $request->location,
        ]);
    }
}
