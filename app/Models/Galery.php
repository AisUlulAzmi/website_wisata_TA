<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'slug',
        'is_published',
    ];

    function SubGalery() {
        return $this->hasMany(SubGalery::class, 'galery_id', 'id');
    }
}
