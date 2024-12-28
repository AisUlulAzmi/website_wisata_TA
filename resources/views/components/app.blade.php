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

  <!-- Modal -->
  <div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="serch_form">
            <input type="text" placeholder="Search" >
            <button type="submit">search</button>
        </div>
      </div>
    </div>
  </div>
    @include('components.layouts.script')
    @stack('js')
</body>

</html>