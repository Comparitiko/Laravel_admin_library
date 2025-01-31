<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\StoreBookRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Http\Resources\Book\AllBookInfoResource;
use App\Http\Resources\Book\BookAuthorResource;
use App\Http\Resources\Book\BookResource;
use App\Models\Author;
use App\Models\Book;
use App\Models\Location;
use Illuminate\Http\Request;

class BookController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(10);
        return view('pages.books.index', ['books' => $books]);
    }

    public function search(Request $request) {
        // Search books by title, isbn and author
        $books = Book::with(['author', 'location'])
            ->where('isbn', 'like', '%' . $request->isbn . '%')
            ->where('title', 'like', '%' . $request->title . '%')
            ->whereHas('author', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->author . '%');
            })
            ->paginate(10);

        return view('pages.books.index', ['books' => $books, 'title' => $request->title, 'isbn' => $request->isbn, 'author' => $request->author]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get all possible names from database for select inputs
        $authors = Author::select('name', 'id')->get();
        $libraries = Location::select('library_name', 'id')->get();
        $states = Book::select('state')->distinct()->get();;



        return view('pages.books.create-book', [
            'authors' => $authors,
            'libraries' => $libraries,
            'bookStates' => $states,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        // Upload cover to storage
        $path = $request->file('cover')->store('images/covers');

        if (!$path) {
            return redirect()->back()->withErrors(['cover' => 'La portada del libro no pudo ser subida, pruebe de nuevo más tarde']);
        }

        // Create new book with the data from the request and the uploaded cover url
        $book = new Book();
        $book->fill($request->all());
        $book->cover = $path;
        $isSaved = $book->save();

        if (!$isSaved) {
            return redirect()->back()->with(['book' => 'El libro no pudo ser creado, pruebe de nuevo más tarde']);
        }

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('pages.books.show-book', [
            'book' => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        // Get all possible names from database for select inputs
        $authors = Author::select('name', 'id')->get();
        $libraries = Location::select('library_name', 'id')->get();
        $states = Book::select('state')->distinct()->get();;

        return view('pages.books.edit-book', [
            'book' => $book,
            'authors' => $authors,
            'libraries' => $libraries,
            'bookStates' => $states,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        // Update data
        $book->update($request->validated());
        // Save data
        if ($book->save()) {
            return redirect()->route('books.index');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
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
