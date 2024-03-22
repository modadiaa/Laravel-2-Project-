  <!-- Carousel Start -->
  <div class="container-fluid p-0 ">
    <div class="owl-carousel header-carousel position-relative">

        @foreach (\App\Models\Slider::all() as $sliders => $slider)
        <div class="owl-carousel-item position-relative">

            <img class="img-fluid" src=" {{ asset('uploads/sliders/'.$slider->image) }}" alt="">
            <div class="carousel-inner">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8 text-center">
                            <h1 class="display-3 text-white animated slideInDown mb-4">{{ $slider->small_title	 }}</h1>
                            <p class="fs-5 text-white mb-4 pb-2"></p>
                            <!--<a href=""
                                class="btn btn-primary rounded-pill py-md-3 px-md-5 me-3 animated slideInLeft">
                                More</a>-->
                            <a href="{{ url('contact') }}" class="btn btn-light rounded-pill py-md-3 px-md-5 animated slideInRight">Free
                                Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>
<!-- Carousel End -->
