<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'pivot'
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_genre');
    }
}
