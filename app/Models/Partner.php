<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'organization',
        'contact_name',
        'email',
        'phone',
        'organization_type',
        'interest_area',
        'message',
    ];
}
