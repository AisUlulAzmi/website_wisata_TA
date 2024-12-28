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

    function tentang() {
        return view('about');
    }

    function destinasi() {
        return view('destination')
            ->with('show_route', 'destinasi.show')
            ->with('data', Destination::where('is_published', true)->paginate(4));
    }

    function destinasiShow($slug) {
        return view('destination_show')
            ->with('show_route', 'destinasi.show')
            ->with('others', Destination::where('is_published', true)->limit(3)->get())
            ->with('data', Destination::where('slug', $slug)->firstOrFail());
    }
}
