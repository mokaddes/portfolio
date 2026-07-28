<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'order_id', 'parent_id', 'status', 'tags'];

    protected $casts = [
        'status' => 'boolean',
        'tags' => 'array',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
