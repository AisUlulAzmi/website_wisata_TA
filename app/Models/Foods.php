<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'stars',
        'is_published',
        'video_youtube'
    ];
}
