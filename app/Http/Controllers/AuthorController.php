<?php

namespace App\Http\Controllers;

use App\Http\Requests\Author\StoreAuthorRequest;
use App\Http\Requests\Author\UpdateAuthorRequest;
use App\Http\Resources\Author\AllAuthorInfo;
use App\Http\Resources\AuthorCollection;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function search(Request $request)
    {
        $authors = DB::table('authors')
            ->where('nationality', 'like', '%' . $request->nationality . '%')
            ->where('name', 'like', '%' . $request->name . '%')
            ->paginate(10);

        return view('pages.authors.index', ['authors' => $authors, 'name' => $request->name, 'nationality' =>
            $request->nationality]);
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
    public function store(StoreAuthorRequest $request)
    {
        // Create new author
        $author = new Author();
        $author->fill($request->all());
        $author->save();

        return redirect()->route('authors.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('pages.authors.edit-author', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
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
        return AllAuthorInfo::collection(Author::paginate(10));
    }
}
