@extends('components.app')
@section('title', 'Home')

@section('content')
    <!-- popular_destination_area_start  -->
    <div class="popular_destination_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Populer Destinasi</h3>
                        <p>Kawasan ini menawarkan pengalaman unik dengan air hangat alami yang berasal dari perut bumi serta udara sejuk pegunungan. Di sini, pengunjung dapat menikmati 25 pancuran air panas dengan suhu yang berbeda-beda. Selain berendam, mereka juga dapat menikmati pemandangan asri dan trekking ke Gunung Slamet.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_destination">
                        <div class="thumb">
                            <img src="img/destination/1.png" alt="">
                        </div>
                        <div class="content">
                            <p class="d-flex align-items-center">Pasar Oleh-Oleh <a href="Pasar.html">  01 Places</a> </p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_destination">
                        <div class="thumb">
                            <img src="img/destination/2.png" alt="">
                        </div>
                        <div class="content">
                            <p class="d-flex align-items-center">Pancuran 13 Guci <a href="pancuran_13.html">  02 Places</a> </p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_destination">
                        <div class="thumb">
                            <img src="img/destination/3.png" alt="">
                        </div>
                        <div class="content">
                            <p class="d-flex align-items-center">The Baron Hill <a href="the_baron.html">  03 Places</a> </p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_destination">
                        <div class="thumb">
                            <img src="img/destination/4.png" alt="">
                        </div>
                        <div class="content">
                            <p class="d-flex align-items-center">Duta Wisata <a href="duta_wisata.html">  04 Places</a> </p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_destination">
                        <div class="thumb">
                            <img src="img/destination/5.png" alt="">
                        </div>
                        <div class="content">
                            <p class="d-flex align-items-center">Curug Serwiti <a href="Curug_Seriti.html">  05 Places</a> </p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_destination">
                        <div class="thumb">
                            <img src="img/destination/6.png" alt="">
                        </div>
                        <div class="content">
                            <p class="d-flex align-items-center">Guci Forest <a href="guci_forest.html">  06 Places</a> </p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_destination_area_end  -->
@endsection

@push('banner')
<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="slider_text text-center">
                            <h3>GUCI</h3>
                            <p>tempat wisata di kawasan Taman Wisata Alam Guci, menghadirkan suasana sejuk dan bikin adem.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider  d-flex align-items-center slider_bg_2 overlay">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="slider_text text-center">
                            <h3>GUCI</h3>
                            <p>cocok wisata keluarga selama berada di Kabupaten Tegal, Jawa Tengah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider  d-flex align-items-center slider_bg_3 overlay">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="slider_text text-center">
                            <h3>GUCI</h3>
                            <p>ketenangan dan menyegarkan diri dari kepenatan sehari-hari.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush