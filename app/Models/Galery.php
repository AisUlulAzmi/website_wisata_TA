<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $fillable = [
        'image',
        'is_published',
    ];
}