@extends('components.app')
@section('title', 'Berita')

@section('content')
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    
                    @foreach ($data as $d)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="{{Storage::url($d->image)}}" alt="">
                            <a href="{{route($show_route, $d->slug)}}" class="blog_item_date">
                                <h3>
                                    {{$d->created_at->format('d')}}
                                </h3>
                                <p>
                                    {{$d->created_at->format('M')}}
                                </p>
                            </a>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="{{route($show_route, $d->slug)}}">
                                <h2>
                                    {{$d->title}}
                                </h2>
                            </a>
                            <p>
                                {{ Str::limit(strip_tags($d->content), 200, '...') }}
                            </p>
                            <ul class="blog-info-link">
                                <li><span href="#"><i class="fa fa-user"></i>Azmi, Guciku Tegal</span></li>
                            </ul>
                        </div>
                    </article>
                    @endforeach

                    {{$data->links()}}
                    
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent Post</h3>
                        
                        @foreach ($recent_posts as $rp)
                        <div class="media post_item">
                            <img src="{{Storage::url($rp->image)}}" style="width: 90px" alt="post">
                            <div class="media-body">
                                <a href="{{route($show_route, $rp->slug)}}">
                                    <h3>
                                        {{$rp->title}}
                                    </h3>
                                </a>
                                <p>
                                    {{\Carbon\Carbon::parse($rp->created_at)->diffForHumans()}}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </aside>
                
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Category</h4>
                        <ul class="list cat-list">
                            @foreach ($categories as $key => $cat)
                            <li>
                                <a href="{{route('berita', ['category' => $key])}}" class="d-flex">
                                    <p>{{$cat}} ({{\App\Models\News::where('category', $key) -> count()}})</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('banner')
<!-- bradcam_area  -->
<div class="bradcam_area" style="background-image: url('{{ Storage::url(\App\Models\Settings::cari('banner-image')) }}')">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>berita</h3>
                    <p>Berita seputar wisata Guciku</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
@endpush