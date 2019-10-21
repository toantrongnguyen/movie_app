<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'overview',
    ];

    protected $hidden = [
        'pivot'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre');
    }

    public function bookable_seats()
    {
        return $this->hasMany(BookableSeat::class);
    }
}
