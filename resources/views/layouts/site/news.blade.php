   <!-- Service Start -->
   <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center">
            <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
            <h1 class="display-5 mb-5">@lang('site.news') </h1>
        </div>
        <div class="row g-0 service-row">

            @foreach (\App\Models\News::take(2)->get() as $News => $nee)

            <div class="col-md-6 col-lg- 6wow fadeIn" data-wow-delay="0.1s">
                <div class="service-item border h-100 p-5">
                    <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                        <img class="img-fluid" src="{{ asset('assets/site/img/icon/1.png') }}" alt="Icon">
                    </div>
                    <h4 class="mb-3"> {{ $nee->title }}</h4>
                    <h6 class="mb-4 kll">{!!  $nee->description  !!}</h6>

                        @if (App::getLocale() == 'en')
                          <a class="btn" href=""><i class="fa fa-arrow-right text-white me-3"></i>Read More</a>
                        @else
                          <a class="btn" href=""><i class="fa fa-arrow-left text-white ms-3"></i> المزيد</a>
                        @endif

                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>
<!-- Service End -->

