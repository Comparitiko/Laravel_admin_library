<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /** @use HasFactory<\Database\Factories\LocationFactory> */
    use HasFactory;

    protected $fillable = [
        'library_name',
        'address',
        'shelf_number',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
