<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'category';

    protected $fillabel = [

        'name',
        'slug',
        'description',
        'aktif'
    ];

    public function blog(): HasMany
    {
        return $this->hasMany(Blog::class);
    }
}
