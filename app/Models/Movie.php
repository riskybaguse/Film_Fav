<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'director',
        'release_year',
        'synopsis',
        'poster_url',
        'genre',
    ];

    protected $casts = [
        'release_year' => 'integer',
    ];

    public function getPosterUrlAttribute($value)
    {
        return $value ? asset($value) : null;
    }
}
