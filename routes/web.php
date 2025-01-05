<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePage;

Route::get('/', [HomePage::class, 'index']) -> name('home');
Route::get('/tentang', [HomePage::class, 'tentang']) -> name('tentang');

Route::get('/penginapan', [HomePage::class, 'penginapan']) -> name('penginapan');
Route::get('/penginapan/{slug}', [HomePage::class, 'penginapanShow']) -> name('penginapan.show');

Route::get('/destinasi', [HomePage::class, 'destinasi']) -> name('destinasi');
Route::get('/destinasi/{slug}', [HomePage::class, 'destinasiShow']) -> name('destinasi.show');

Route::get('/berita', [HomePage::class, 'berita']) -> name('berita');
Route::get('/berita/{slug}', [HomePage::class, 'beritaShow']) -> name('berita.show');

Route::get('/kuliner', [HomePage::class, 'kuliner']) -> name('kuliner');
Route::get('/kuliner/{slug}', [HomePage::class, 'kulinerShow']) -> name('kuliner.show');

Route::get('/galeri', [HomePage::class, 'galeri']) -> name('galeri');
Route::get('/galeri/{slug}', [HomePage::class, 'galeriShow']) -> name('galeri.show');