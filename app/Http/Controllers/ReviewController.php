<?php

namespace App\Http\Controllers;

use App\Http\Filters\FilmFilter;
use App\Http\Requests\FilmRequest;
use App\Http\Requests\ReviewRequest;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Review;
use App\Services\FilmService;

class ReviewController extends Controller
{
    public function store(ReviewRequest $reviewRequest)
    {
        $data = $reviewRequest->validated();
        Review::create($data);

        $rating = Film::find($data['film_id'])->reviews()->pluck('mark')->avg();
        Film::find($data['film_id'])->update([
            'rating' => round($rating, 1)
        ]);

        return redirect()->route('film.show', $data['film_id']);
    }
}
