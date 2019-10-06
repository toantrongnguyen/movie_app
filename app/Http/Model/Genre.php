<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'genre_title',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_genre');
    }
}
