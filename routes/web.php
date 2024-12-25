<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePage;

Route::get('/', [HomePage::class, 'index']);
