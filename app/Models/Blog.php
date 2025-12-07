<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'brief',
        'content',
        'image',
        'published_date',
    ];

    protected $casts = [
        'published_date' => 'datetime',
    ];

}
