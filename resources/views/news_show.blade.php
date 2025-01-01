@extends('components.app')
@section('title', $data->title)

@section('content')
<section class="blog_area single-post-area section-padding">
    <div class="container">
       <div class="row">
          <div class="col-lg-8 posts-list">
             <div class="single-post">
                <div class="feature-img">
                   <img class="img-fluid" src="{{Storage::url($data->image)}}" alt="">
                </div>
                <div class="blog_details">
                   <h2>
                    {{$data->title}}
                   </h2>
                   <ul class="blog-info-link mt-3 mb-4">
                      <li><a href="#"><i class="fa fa-user"></i>Azmi, Guciku Tegal</a></li>
                   </ul>
                   <p>
                    {!!($data->content)!!}
                   </p>
                </div>
             </div>
             <div class="navigation-top">
                <div class="d-sm-flex justify-content-between text-center">
                   <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span>Azmi, Guciku Tegal</p>
                   {{-- <ul class="social-icons">
                      <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                   </ul> --}}
                </div>
                
                <div class="navigation-area">
                    <div class="row">
                        @if ($previous_post)
                        <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                            <div class="thumb">
                               <a href="{{route($show_route, $previous_post->slug)}}">
                                  <img class="img-fluid" style="width: 80px" src="{{Storage::url($previous_post->image)}}" alt="">
                               </a>
                            </div>
                            <div class="arrow">
                               <a href="{{route($show_route, $previous_post->slug)}}">
                                  <span class="lnr text-white ti-arrow-left"></span>
                               </a>
                            </div>
                            <div class="detials">
                               <p>Prev Post</p>
                               <a href="{{route($show_route, $previous_post->slug)}}">
                                  <h4>
                                      {{Str::limit($previous_post->title, 40)}}
                                  </h4>
                               </a>
                            </div>
                         </div>
                        @else
                        <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center"></div>
                        @endif

                       @if ($next_post)
                        <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                            <div class="detials">
                            <p>Next Post</p>
                            <a href="{{route($show_route, $next_post->slug)}}">
                                <h4>
                                    {{Str::limit($next_post->title, 40)}}
                                </h4>
                            </a>
                            </div>
                            <div class="arrow">
                            <a href="{{route($show_route, $next_post->slug)}}">
                                <span class="lnr text-white ti-arrow-right"></span>
                            </a>
                            </div>
                            <div class="thumb">
                            <a href="{{route($show_route, $next_post->slug)}}">
                                <img class="img-fluid" src="{{url('img/post/next.png')}}" alt="">
                            </a>
                            </div>
                        </div>
                       @endif
                    </div>
                 </div>
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
                    <h3>
                        @if (isset($data))
                            {{$data->title}}
                        @else
                            News
                        @endif
                    </h3>
                    <p>
                        Berita seputar wisata Guciku
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->
@endpush