<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    use Filterable;

    protected $guarded = [];

    public function films() {
        return $this->belongsToMany(Film::class, 'genre_films')->get();
    }
}
