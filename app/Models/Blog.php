<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'related_topics',
        'category',
        'cover_image',
        'published_at',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
        'status' => 'boolean',
        'related_topics' => 'array',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
