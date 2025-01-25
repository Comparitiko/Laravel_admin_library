<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\StoreBookRequest;
use App\Http\Resources\Book\AllBookInfoResource;
use App\Http\Resources\Book\BookAuthorResource;
use App\Http\Resources\Book\BookResource;
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
        $books = Book::paginate(20);

        if ($books->isEmpty()) {
            return response()->json();
        }

        return BookAuthorResource::collection($books);
    }

    public function api_one_book_by_isbn(string $isbn)
    {
        $book = Book::where('isbn', $isbn)->first();

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return AllBookInfoResource::make($book);
    }

    public function api_all_books_by_author(int $author_id)
    {
        $books = Book::where('author_id', $author_id)->paginate(20);

        if ($books->isEmpty()) {
            return response()->json(['message' => 'No books found'], 404);
        }

        return BookResource::collection($books);
    }

    public function api_store(StoreBookRequest $request)
    {

        dd($request->messages());
        // check if book is already exists
        $book = Book::where('isbn', $request->isbn)->first();

        if ($book) {
            return response()->json(['message' => 'Book isbn already exists'], 400);
        }

        // Upload cover to storage
        $path = $request->file('cover')->store('images/covers');

        if (!$path) {
            return response()->json(['message' => 'Cover not uploaded successfully, try again later'], 400);
        }

        // Create new book
        $book = new Book();

        $book->fill($request->all());

        $book->cover = $path;

        $saved = $book->save();
        if ($saved) {
            return response()->json(['message' => 'Book created successfully', 'book' => BookResource::make($book)], 201);
        }

        return response()->json(['message' => 'Book not created successfully'], 400);
    }

    public function api_destroy(string $isbn)
    {
        $book = Book::where('isbn', $isbn)->first();
        if ($book) {
            $book->delete();
            return response()->json(['message' => 'Book deleted successfully']);
        }
        return response()->json(['message' => 'Book not found'], 404);
    }

}
