@extends('layouts.site.site')
@section('title', __("site.about"))

@foreach ( $about as $abou)
@section('optionn',$abou->optionn)
@section('keyword',$abou->keyword)
@endforeach





@section('sidebar')
<div class="container-fluid page-header py-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">  @lang('site.about')</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}"> @lang('site.home')</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">  @lang('site.about')</li>
            </ol>
        </nav>
    </div>
</div>
<!-- About Start -->
<div class="container-fluid bg-light overflow-hidden  px-lg-0" style="">
    <div class="container about px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 ps-lg-0" style="">
                <div class="position-relative h-100">
                    @foreach (\App\Models\About::get() as $about => $abou)
                     @if($abou->id === 2)
                    <img class="position-absolute img-fluid w-100 h-100" src="{{asset('uploads/about/'.$abou->image)}}"
                        style="object-fit: cover;" alt="">
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg-5 pe-lg-0">
                    <div class="bg-primary mb-3" style=""></div>
                    @foreach (\App\Models\About::get() as $about => $abou)
                    @if($abou->id === 2)
                    <h1 class="display-5 mb-2">{{ $abou->name }}  </h1>

                    <h6 class="display-6 mb-2">{{ $abou->title }}  </h6>

                    <p class="mb-2 pb-2 kl">{!! $abou->description !!}
                    </p>
                    @endif
                    @endforeach



                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
@endsection

