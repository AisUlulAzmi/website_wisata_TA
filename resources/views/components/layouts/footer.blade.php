<div class="footer_top">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-6 col-lg-4 ">
                <div class="footer_widget">
                    <div class="footer_logo">
                        <a href="#">
                            <img src="img/footer_logo.png" alt="" width="50px">
                        </a>
                    </div>
                    <p>Jl. Objek Wisata Guci, Kemaron, Tuwel, Kec. Bojong <br> Kabupaten Tegal, Jawa Tengah 52465 <br>
                        <a href="#">0878-3027-0670</a> <br>
                    </p>
                    <div class="socail_links">
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/guciforestt">
                                    <i class="ti-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/guciforest_/">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-xl-2 col-md-6 col-lg-2">
                <div class="footer_widget">
                    <h3 class="footer_title">
                        Company
                    </h3>
                    <ul class="links">
                        <li><a href="https://kemenparekraf.go.id/">Kemenparekraf</a></li>
                        <li><a href="https://www.tegalkab.go.id/"> Kabupaten Tegal</a></li>
                        <li><a href="https://www.perhutani.co.id/"> Perhutani</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-lg-3">
                <div class="footer_widget">
                    <h3 class="footer_title">
                        Popular destination
                    </h3>
                    <ul class="links double_links">
                        @foreach (\App\Models\Destination::where('is_published', true) -> get() as $d)
                            <li>
                                <a href="{{route('destinasi.show', $d->slug)}}">
                                    {{$d->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-lg-3">
                <div class="footer_widget">
                    <h3 class="footer_title">
                        Koleksi Foto
                    </h3>
                    <div class="instagram_feed">
                        @foreach (\App\Models\Galery::where('is_published', true) -> limit(6) -> get() as $g)
                        <div class="single_insta">
                            <a href="{{route('galeri')}}">
                                <img src="{{Storage::url($g->image)}}" alt="">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copy-right_text">
    <div class="container">
        <div class="footer_border"></div>
        <div class="row">
            <div class="col-xl-12">
                <p class="copy_right text-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> travelling Guciku</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</div>