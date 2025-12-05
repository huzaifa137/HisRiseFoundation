<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'event_date',
        'event_time',
        'title',
        'description',
        'image',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];
}
