<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'nationality' => $this->nationality,
            'date_of_birth' => $this->date_of_birth,
            'dewey_code' => $this->dewey_code,
            'books' => $this->books->map(function ($book) {
                return [
                    'id' => $book->id,
                    'isbn' => $book->isbn,
                    'title' => $book->title,
                    'cover' => $book->cover,
                    'publication_year' => $book->publication_year,
                    'state' => $book->state,
                    'location' => [
                        'id' => $book->location->id,
                        'library_name' => $book->location->library_name,
                        'address' => $book->location->address,
                        'shelf_number' => $book->location->shelf_number,
                    ],
                ];
            }),
        ];
    }
}
