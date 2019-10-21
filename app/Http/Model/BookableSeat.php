<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookableSeat extends Model
{
    protected $fillable = [
        'available_seat',
    ];

    protected $hidden = [
        'pivot'
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
