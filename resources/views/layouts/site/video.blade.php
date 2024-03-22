
@extends('layouts.site.site')
@section('title', __("site.video"))

@section('sidebar')

<div class="container-fluid page-header py-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown"> @lang('site.video') </h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}"> @lang('site.home')</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page"> @lang('site.video')  </li>
            </ol>
        </nav>
    </div>
</div>



<!-- Projects Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
            <h1 class="display-5 mb-5">@lang('site.video') </h1>
        </div>

        <div class="row g-4 portfolio-container">

            @foreach ( $video as $vide)
            <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                <div class="portfolio-inner">
                    <img class="img-fluid w-100" src="{{ asset('uploads/videos/'.$vide->image) }}" alt="">
                    <div class="text-center p-4">
                        <p class="text-primary mb-2"></p>
                        <h5 class="lh-base mb-0"> {{ $vide->name }}</h5>
                    </div>
                    <div class="portfolio-text text-center bg-white p-4">
                        <p class="text-primary mb-2"></p>
                        <h5 class="lh-base mb-3"> {{ $vide->name }} </h5>
                        <div class="d-flex justify-content-center">

                            <a class="btn btn-square btn-primary rounded-circle mx-1" target="_blank"
                                href="{{ $vide->link }}"><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Projects End -->



@endsection
