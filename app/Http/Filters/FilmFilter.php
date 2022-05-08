<?php


namespace App\Http\Filters;


use App\Models\Genre;
use Illuminate\Database\Eloquent\Builder;

class FilmFilter extends AbstractFilter
{
    public const GENRE = 'genre';
    public const YEAR = 'year';
    public const SORT = 'sort';

    protected function getCallbacks(): array
    {
        return [
            self::GENRE => [$this, 'genre'],
            self::YEAR => [$this, 'year'],
            self::SORT => [$this, 'sort']
        ];
    }

    public function genre(Builder $builder, $value)
    {
        $films_by_genre = Genre::find($value)->films()->pluck('id');
        $builder->whereIn('id', $films_by_genre);
    }

    public function year(Builder $builder, $value)
    {
        $builder->where('year', $value);
    }

    public function sort(Builder $builder, $value) {
        if ($value == "Rating") {
            $builder->orderBy('rating', 'desc');
        }
        if ($value == "YearDesc") {
            $builder->orderBy('year', 'desc');
        }
        if ($value == "YearAsc") {
            $builder->orderBy('year');
        }
    }
}
