<?php

namespace App\Http\Controllers;

use App\Http\Filters\FilmFilter;
use App\Http\Requests\FilmRequest;
use App\Models\Film;
use App\Models\Genre;
use App\Services\FilmService;

class FilmController extends Controller
{
    public function index(FilmRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(FilmFilter::class, ['queryParams' => array_filter($data)]);

        $films = Film::filter($filter)->paginate(5);
        $genres = Genre::all();

        return view('film.index', compact('films', 'genres'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('film.create', compact('genres'));
    }

    public function store(FilmRequest $postRequest)
    {
        $data = $postRequest->validated();
        FilmService::store($data);

        return redirect()->route('film.index');
    }

    public function show(Film $film)
    {
        $reviews = $film->reviews();
        $genres = $film->genres()->pluck('title');

        return view('film.show', compact('film', 'reviews', 'genres'));
    }
}
