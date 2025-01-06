<br><br><br><br>

<section class="splide splide_galery" aria-label="Splide Basic HTML Example">
    <div class="splide__track">
          <ul class="splide__list">
            @foreach (\App\Models\Galery::where('is_published', 1) -> get() as $d)
                <li class="splide__slide p-2">
                    <div class="card">
                        <div class="card-body p-0">
                            <img src="{{Storage::url($d->image)}}" class="card-img-top">
                        </div>
                        <div class="card-footer text-center bg-white py-3 pb-0">
                            <a href="{{route('galeri.show', $d->slug)}}">
                                <h4 class="card-title galery-caption">{{$d->title}}</h4>
                            </a>
                        </div>
                    </div>
                </li>  
            @endforeach
          </ul>
    </div>
</section>

@push('css')
    <style>
        .galery-caption {
            color: black;
        }

        .galery-caption:hover {
            color: #dc3545;
        }
    </style>
@endpush

@push('js')
    <script>
        var splide_galery = new Splide( '.splide_galery', {
          type    : 'loop',
          perPage : 3,
          autoplay: true,
        } );

        splide_galery.mount();
    </script>
@endpush