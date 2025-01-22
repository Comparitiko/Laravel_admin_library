<?php

namespace App\Http\Resources\Book;

use App\Http\Resources\Author\AuthorResource;
use App\Http\Resources\Location\LocationResource;
use Illuminate\Http\Request;

class AllBookInfoResource extends BookResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array_merge(parent::toArray($request), [
            'author' => AuthorResource::make($this->author),
            'location' => LocationResource::make($this->location),
        ]);
    }
}
