<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = ['key', 'value'];

    static function cari(string $key) {
        return self::select('value')->where('key', $key)->first()->value;
    }
}
