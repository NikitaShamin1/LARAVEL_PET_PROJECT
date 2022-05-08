<?php

namespace App\Services;

use App\Models\Film;
use App\Models\GenreFilm;

class FilmService
{
    public static function store($data) {
        $genres = $data['genres'];
        unset($data['genres']);

        $film = Film::create($data);

        foreach ($genres as $genre) {
            GenreFilm::create([
                'film_id' => $film->id,
                'genre_id' => $genre
            ]);
        }
    }
}
