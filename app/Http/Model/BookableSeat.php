<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookableSeat extends Model
{
    protected $fillable = [
        'avaiable_seat',
        'movie_id',
    ];

    protected $hidden = [
        'pivot'
    ];

    public function genres()
    {
        return $this->belongsTo(Genre::class, 'movie');
    }
}
