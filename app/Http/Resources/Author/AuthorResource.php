<?php

namespace App\Http\Resources\Author;

use App\Http\Resources\Book\BookAuthorResource;
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
        ];
    }
}
