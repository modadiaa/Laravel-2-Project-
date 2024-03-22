
@extends('layouts.site.site')
@section('title',  "$category->name ")

    @section('optionn',$category->optionn)
    @section('keyword',$category->keyword)


@section('sidebar')

<div class="container-fluid page-header py-5">
    <div class="container py-5">
         <h1 class="display-3 text-white mb-3 animated slideInDown">  {{ $category->name }} </h1>

        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}"> @lang('site.home')</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page"> {{ $category->name }} </li>
            </ol>
        </nav>
    </div>
</div>


<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
            style="max-width: 600px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <h6 class="section-title bg-white text-center text-primary px-3"></h6>
            <h1 class="display-6 mb-4"></h1>
        </div>
        <div class="row g-4">




            @foreach (\App\Models\Product::with('category')->get() as $products => $prod)
             @if ( $prod->category->id == $category->id)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s"
                    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="{{asset('uploads/products/'.$prod->image)}}"
                        data-fancybox="gallery">
                        <img class="img-fluid rounded mb-4" src="{{asset('uploads/products/'.$prod->image)}}" alt="">
                        <h4 class="mb-0">{{ $prod->name }}</h4>
                    </a>
                </div>
              @endif
            @endforeach


        </div>


    </div>

</div>

@endsection
