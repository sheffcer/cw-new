<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewsTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'news_id',
        'locale',
        'title',
        'description',
        'content',
    ];

    /**
     * Связь с новостью
     */
    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }
}
