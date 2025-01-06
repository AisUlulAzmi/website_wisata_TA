<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'operation_hours_start',
        'operation_hours_end',
        'stars',
        'link',
        'is_published',
        'video_youtube'
    ];
}
