<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    protected $fillable = [
        'image',
        'title',
        'caption',
        'is_published',
    ];
}
