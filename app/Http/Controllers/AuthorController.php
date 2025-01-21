<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorCollection;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::paginate(10);
        return view('pages.authors.index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('.pages.authors.create-author');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'biography' => 'required|string|max:255',
            'dewey_code' => 'required|string|regex:/^[0-9]{3}$/',
        ]);

        Author::created($request->all());

        return redirect()->route('pages.authors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        dd($author);
        return view('authors.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'biography' => 'required|string|max:255',
            'dewey_code' => 'required|string|regex:/^[0-9]{3}$/',
        ]);

        $author->update($request->all());

        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index');
    }

    /// API METHODS ///

    public function api_index()
    {
        return new AuthorCollection(Author::paginate(20));
    }
}
