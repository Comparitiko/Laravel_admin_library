<?php

namespace App\Http\Resources\Author;

use App\Http\Resources\Book\BookResource;
use Illuminate\Http\Request;

class AllAuthorInfo extends AuthorResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array_merge(parent::toArray($request), [
            'books' => BookResource::collection($this->books),
        ]);
    }
}
