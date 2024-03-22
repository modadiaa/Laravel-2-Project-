@extends('layouts.site.site')
@section('title', __("site.work"))
@section('optionn',$new->optionn )
@section('keyword',$new->keyword )

@section('sidebar')

<div class="container-fluid page-header py-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $new->name }} </h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}">@lang('site.home')</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page"> {{ $new->name }}</li>
            </ol>
        </nav>
    </div>
</div>


<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <h1 class="display-6 mb-4">{{ $new->title }}</h1>
                <h6 class="mb-5 lo">{!! $new->description !!}</h6>
            </div>
        </div>
    </div>
</div>

@endsection
