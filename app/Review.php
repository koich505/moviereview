<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = [
        'movie_title',
        'stars',
        'review_title',
        'review_body'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }
}
