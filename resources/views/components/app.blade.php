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

    <footer class="footer">
        @include('components.layouts.footer')
    </footer>

    @include('components.layouts.script')
    @stack('js')
</body>

</html>