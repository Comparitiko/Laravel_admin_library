<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'isbn',
        'cover',
        'publication_year',
        'state',
        'author_id',
        'location_id',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
