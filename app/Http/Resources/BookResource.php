<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'isbn' => $this->isbn,
            'title' => $this->title,
            'cover' => $this->cover,
            'publication_year' => $this->publication_year,
            'state' => $this->state,
            'author' => [
                'id' => $this->author->id,
                'name' => $this->author->name,
                'nationality' => $this->author->nationality,
                'date_of_birth' => $this->author->date_of_birth,
                'dewey_code' => $this->author->dewey_code,
            ],
            'location' => [
                'id' => $this->location->id,
                'library_name' => $this->location->library_name,
                'address' => $this->location->address,
                'shelf_number' => $this->location->shelf_number,
            ]
        ];
    }
}
