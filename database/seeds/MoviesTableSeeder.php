<?php

use App\Genre;
use App\Movie;
use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Movie::class, 50)->create()->each(function ($movie) {
            $genres = Genre::all()->random(3);
            $movie->genres()->attach($genres);
        });
    }
}
