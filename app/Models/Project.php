<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'short_description',
        'long_description',
        'problem',
        'solution',
        'my_contribution',
        'image',
        'url',
        'order',
        'is_featured',
        'status',
        'features',
        'technologies',
        'skills_used',
        'screenshots',
    ];

    protected $casts = [
        'features' => 'array',
        'technologies' => 'array',
        'skills_used' => 'array',
        'screenshots' => 'array',
        'is_featured' => 'boolean',
        'status' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
