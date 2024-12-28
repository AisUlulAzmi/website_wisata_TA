<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="section_title text-center mb_70">
                <h3>Dipercaya Dan Didukung Oleh</h3>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach (\App\Models\Clients::where('is_published', true) -> get() as $c)
        <div class="col-lg-4 col-md-6">
            <div class="single_trip">
                <div class="thumb" style="text-align: center;">
                    <img src="{{Storage::url($c->image)}}" alt="">
                </div>
                <div class="info">
                    <a target="_blank" href="{{$c->link}}">
                        <h3 style="text-align: center;">
                            {{$c->name}}
                        </h3>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>