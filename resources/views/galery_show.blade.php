@extends('components.app')
@section('title', $galery->title)

@push('banner')
<!-- bradcam_area  -->
<div class="bradcam_area" style="background-image: url('{{ Storage::url(\App\Models\Settings::cari('banner-image')) }}')">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>
                        @if (isset($galery))
                            {{$galery->title}}
                        @else
                            Galeri
                        @endif
                    </h3>
                    <p>
                        @if (isset($galery))
                            {{$galery->description}}
                        @else
                            Galeri
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
@endpush

@section('content')
<div class="popular_places_area" style="margin-bottom: 0px !important; padding-bottom: 0px !important">
    <div class="container pb-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">

                    @foreach ($data as $d)
                    <div class="col-lg-6 col-md-12">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="{{Storage::url($d->image)}}" alt="">
                            </div>
                            <div class="place_info">
                                <h3>{{$d->title}}</h3>
                                <p>
                                    {{$d->description}}
                                </p>
                                <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center"></span>
                                    <div class="days">
                                        <i class="fa fa-clock-o"></i>
                                        <a href="#">
                                            {{$d->created_at->diffForHumans()}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>

            <br><br>
        </div>
    </div>
</div>
@endsection
