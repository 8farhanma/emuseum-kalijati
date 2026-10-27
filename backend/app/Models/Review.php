<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * average_rating is a generated column and is intentionally not fillable.
     * After create(), call refresh() to load the computed value.
     */
    protected $fillable = [
        'name',
        'city',
        'content',
        'service_rating',
        'facility_rating',
        'cleanliness_rating',
    ];

    protected function casts(): array
    {
        return [
            'average_rating' => 'decimal:2',
        ];
    }
}
