@extends('components.app')
@section('title', 'Penginapan')

@section('content')
<div class="popular_places_area">
    <div class="container pb-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    
                    @foreach ($data as $d)
                    <div class="col-lg-6 col-md-12">
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

                    {{$data->links()}}
            </div>

            <br><br>
        </div>
    </div>
</div>
@endsection

@push('banner')
<!-- bradcam_area  -->
<div class="bradcam_area" style="background-image: url('{{ Storage::url(\App\Models\Settings::cari('banner-image')) }}')">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Penginapan</h3>
                    <p>Pilihan Populer Penginapan Untuk Istirahat</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
@endpush