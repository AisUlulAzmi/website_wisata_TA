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
                @foreach ($destinations as $d)
                <div class="col-lg-4 col-md-6">
                    <div class="single_destination">
                        <div class="thumb">
                            <img src="{{ Storage::url($d->image) }}" alt="">
                        </div>
                        <div class="content">
                            <a href="{{route('destinasi.show', $d->slug)}}">
                                <p class="d-flex align-items-center">
                                    {{$d->name}}
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- popular_destination_area_end  -->
@endsection

@push('banner')
<div class="slider_area">
    <div class="slider_active owl-carousel">
        @foreach ($slideshow as $s)
            <div class="single_slider  d-flex align-items-center overlay" style="background-image: url({{ Storage::url($s->image) }});">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-md-12">
                            <div class="slider_text text-center">
                                <h3>
                                    {{ $s->title }}
                                </h3>
                                <p>
                                    {{ $s->caption }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endpush