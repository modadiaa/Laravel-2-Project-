<!-- Projects Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
            <h1 class="display-5 mb-5">@lang('site.works') </h1>
        </div>

        <div class="row g-4 portfolio-container">

            @foreach (\App\Models\Work::take(3)->get() as $works => $work)
                    <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                        <div class="portfolio-inner">
                            <img class="img-fluid w-100" src="{{asset('uploads/work/'.$work->image)}}" alt="">
                            <div class="text-center p-4">
                                <p class="text-primary mb-2"></p>
                                <h5 class="lh-base mb-0"> {{ $work->name }}</h5>
                            </div>
                            <div class="portfolio-text text-center bg-white p-4">
                                <p class="text-primary mb-2"></p>
                                <h5 class="lh-base mb-3"> {{ $work->description }}</h5>
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href="img/works/1.jpg"
                                        data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-square btn-primary rounded-circle mx-1" href=""><i
                                            class="fa fa-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

        </div>
    </div>
</div>
<!-- Projects End -->
