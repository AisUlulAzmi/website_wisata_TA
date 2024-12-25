<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'operation_hours_start',
        'operation_hours_end',
        'stars',
        'is_published',
    ];
}
