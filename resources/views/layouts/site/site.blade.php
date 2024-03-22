@extends('Website.homepage')
@section('title', __("site.Web"))

@section('content')

@include('layouts.admin.success')
@include('layouts.admin.error')

    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

@include('layouts.site.header')
@section('sidebar')
    @include('layouts.site.slider')
    @include('layouts.site.welcome')
    @include('layouts.site.project')
    @include('layouts.site.works')
    @include('layouts.site.news')
@show

@include('layouts.site.footer')
@endsection

