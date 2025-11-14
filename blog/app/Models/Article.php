<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'excerpt', 'views', 'published',
    ];

    protected $casts = [
        'views'     => 'integer',
        'published' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
