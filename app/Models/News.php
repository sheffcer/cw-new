<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'is_new',
        'image_default',
        'image_mobile',
        'image_tablet',
        'content'
    ];

    protected $casts = [
        'date' => 'date',
        'is_new' => 'boolean',
    ];
}
