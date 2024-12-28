<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('components.layouts.head')
    @stack('css')
</head>

<body>

    <!-- header-start -->
    <header>
        @include('components.layouts.header')
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
    @stack('banner')
    <!-- slider_area_end -->
    
    @yield('content')

    <div class="video_area overlay" style="background-image: url('{{ Storage::url(\App\Models\Settings::cari('video-overlay-image')) }}')">
        @include('components.layouts.video_area')
    </div>

    <div class="travel_variation_area">
        @include('components.layouts.why_us')
    </div>

    <div class="recent_trip_area">
        @include('components.layouts.clients')
    </div>

    <footer class="footer">
        @include('components.layouts.footer')
    </footer>

    @include('components.layouts.script')
    @stack('js')
</body>

</html>