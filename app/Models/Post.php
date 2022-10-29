<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'available_at'
    ];

    protected $dates = [
        'available_at'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeSearch(Builder $query, string $search) {
        $query->where('title', 'LIKE', "%$search%");
    }
    // available_at_pt
    public function getAvailableAtPtAttribute()
    {
        return  $this->available_at?->format('d-m-Y H:i');
    }

    public function getPreviewContentAttribute()
    {
        return Str::limit($this->content, 100, '...');
    }
}
