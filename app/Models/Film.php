<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    use Filterable;

    protected $guarded = [];

    public function genres() {
        return $this->belongsToMany(Genre::class, 'genre_films')->get();
    }

    public function reviews() {
        return $this->hasMany(Review::class)->get();
    }
}
