<?php

namespace App\Http\Controllers;

use App\Models\Slideshow;
use App\Models\Destination;
use App\Models\Foods;
use App\Models\Galery;
use App\Models\Hotel;
use App\Models\News;
use Illuminate\Http\Request;

class HomePage extends Controller
{
    protected static $news_categories = [
        'destinasi' => 'Destinasi',
        'wisata' => 'Wisata',
        'kuliner' => 'Kuliner',
        'hotel' => 'Hotel',
        'event' => 'Event',
        'tips' => 'Tips',
        'berita' => 'Berita',
        'promo' => 'Promo',
        'umum' => 'Umum',
        'lainnya' => 'Lainnya',
    ];

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

    function beritaShow($slug) {
        $previous_post = News::where('is_published', true)
                            ->where('id', '<', News::where('slug', $slug)->firstOrFail()->id)
                            ->orderBy('id', 'desc')
                            ->first();

        $next_post = News::where('is_published', true)
                            ->where('id', '>', News::where('slug', $slug)->firstOrFail()->id)
                            ->orderBy('id', 'asc')
                            ->first();

        $recent_posts = News::where('is_published', true)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();

        return view('news_show')
            ->with('previous_post', $previous_post)
            ->with('next_post', $next_post)
            ->with('show_route', 'berita.show')
            ->with('recent_posts', $recent_posts)
            ->with('categories', self::$news_categories)
            ->with('others', News::where('is_published', true)->limit(3)->get())
            ->with('data', News::where('slug', $slug)->firstOrFail());
    }

    function berita(Request $request) {
        $news = News::where('is_published', true)
                    ->when($request->has('category'), function($query) use ($request) {
                        return $query->where('category', $request->category);
                    })
                    ->paginate(4);
        
        $recent_posts = News::where('is_published', true)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();

        return view('news')
            ->with('categories', self::$news_categories)
            ->with('recent_posts', $recent_posts)
            ->with('show_route', 'berita.show')
            ->with('data', $news);
    }

    function penginapan() {
        return view('hotel')
            ->with('show_route', 'penginapan.show')
            ->with('data', Hotel::where('is_published', true)->paginate(4));
    }

    function penginapanShow($slug) {
        return view('hotel_show')
        ->with('show_route', 'penginapan.show')
            ->with('others', Hotel::where('is_published', true)->limit(3)->get())
            ->with('data', Hotel::where('slug', $slug)->firstOrFail());
    }

    function kuliner() {
        return view('foods')
            ->with('show_route', 'kuliner.show')
            ->with('data', Foods::where('is_published', true)->paginate(4));
    }

    function kulinerShow($slug) {
        return view('foods_show')
        ->with('show_route', 'kuliner.show')
            ->with('others', Foods::where('is_published', true)->limit(3)->get())
            ->with('data', Foods::where('slug', $slug)->firstOrFail());
    }

    function galeri() {
        return view('galery')
        ->with('data', Galery::where('is_published', true)->paginate(4));        
    }

    function galeriShow($slug) {
        $galery = Galery::where('slug', $slug)->firstOrFail();
        return view('galery_show')
            ->with('galery', $galery)
            ->with('data', $galery->SubGalery->where('is_published', true));
    }
}
