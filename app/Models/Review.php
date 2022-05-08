<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    use Filterable;

    protected $guarded = [];

    public function film() {
        return $this->hasOne(Film::class, 'id')->pluck('name')->first();
    }
}
