<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insight extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'published',
        'content',
    ];

    protected $casts = [
        'content' => 'array',
        'published' => 'boolean',
    ];
}