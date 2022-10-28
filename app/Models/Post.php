<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'available_at'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeSearch(Builder $query, string $search) {
        $query->where('title', 'LIKE', "%$search%");
    }
}
