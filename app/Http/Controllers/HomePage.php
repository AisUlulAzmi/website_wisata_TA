<?php

namespace App\Http\Controllers;

use App\Models\Slideshow;
use App\Models\Destination;
use Illuminate\Http\Request;

class HomePage extends Controller
{
    function index() {
        return view('index')
            ->with('destinations', Destination::where('is_published', true)->limit(6)->get())
            ->with('slideshow', Slideshow::where('is_published', true)->get());
    }

    function destinasi() {
        
    }

    function destinasiShow() {
        
    }
}
