<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'author';

    protected $fillable = [
        'name',
        'email',
        'bio',
        'instagram',
        'twitter'
    ];

    public function blog():  HasMany
    {
        return $this->hasMany(Blog::class);
    }
}
