<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubGalery extends Model
{
    protected $fillable = [
        'galery_id',
        'title',
        'image',
        'description',
        'is_published',
    ];

    function Galery() {
        return $this->hasOne(Galery::class, 'id', 'galery_id');
    }
}
