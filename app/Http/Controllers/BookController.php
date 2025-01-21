<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }

    /// API METHODS ///

    public function api_index()
    {
        return new BookCollection(Book::paginate(20));
    }

    public function api_one_book_by_isbn(string $isbn)
    {
        $book = Book::where('isbn', $isbn)->first();
        return BookResource::make($book);
    }

    public function api_all_books_by_author(int $author_id)
    {
        $books = Book::where('author_id', $author_id)->get();
        return BookResource::collection($books);
    }

}
