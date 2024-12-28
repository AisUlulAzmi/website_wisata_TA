@extends('components.app')
@section('title', 'Destinasi')

@section('content')
<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">
                <div class="destination_info">
                    <h3>Description</h3>
                    
                    {!!($data->description)!!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popular_places_area" style="background-color: white !important; margin-top: 0px !important; padding-top: 0px !important; margin-bottom: 0px !important; padding-bottom: 0px !important">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3>Menarik Lainnya</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($others as $d)
            <div class="col-lg-4 col-md-6">
                <div class="single_place">
                    <div class="thumb">
                        <img src="{{Storage::url($d->image)}}" alt="">
                        {{-- <a href="{{route($show_route, $d->slug)}}" class="prise">rekomen</a> --}}
                    </div>
                    <div class="place_info">
                        <a href="{{route($show_route, $d->slug)}}"><h3>{{$d->name}}</h3></a>
                        <p>
                            Jam Operasional {{$d->operation_hours_start}} sampai {{$d->operation_hours_end}}
                        </p>
                        <div class="rating_days d-flex justify-content-between">
                            <span class="d-flex justify-content-center align-items-center">
                                @for ($i = 1; $i <= $d->stars; $i++)
                                    <i class="fa fa-star"></i> 
                                @endfor
                            </span>
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
    </div>
</div>

<br><br>
<br><br>
@endsection

@push('banner')
<!-- bradcam_area  -->
<div class="bradcam_area" style="background-image: url('{{ Storage::url(\App\Models\Settings::cari('banner-image')) }}')">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>
                        @if (isset($data))
                            {{$data->name}}
                        @else
                            Destinations
                        @endif
                    </h3>
                    <p>
                        Pilihan Populer Wisata Untuk Berkunjung
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
@endpush