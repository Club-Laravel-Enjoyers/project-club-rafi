<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'blog';

    protected $fillable = [
        'authors_id',
        'categories_id',
        'title',
        'slug',
        'image',
        'content',
        'publish',
        'tags',
        'visible'
    ];

    protected $casts = [
        'publish' => 'date',
        'tags' => 'json',
    ];

    public function scopeActive($query, $status = 1)
    {
        return $query->where('visible', $status);
    }

    public function authors(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
