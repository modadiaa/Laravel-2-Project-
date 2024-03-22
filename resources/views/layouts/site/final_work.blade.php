@extends('layouts.site.site')
@section('title', __("site.woork"))
@section('optionn',$works->optionn )
@section('keyword',$works->keyword )

@section('sidebar')
<div class="container-fluid page-header py-5">
    <div class="container py-5">
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $works->name }} </h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-white" href="{{ url('/') }}"> @lang('site.home')</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">  {{ $works->name }} </li>
            </ol>
        </nav>

    </div>
</div>


<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div id="detail-carousel" class="carousel slide mb-5" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach (\App\Models\Work::get() as $final_work => $wo)
                            <div class="carousel-item active">
                                <img class="w-100" src="{{asset('uploads/work/'.$wo->image)}}" alt="Image">
                            </div>
                        @endforeach

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#detail-carousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#detail-carousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <h1 class="mb-3 ">{{ $works->name }}</h1>
                <h6 class="lo">{!! $works->description !!}
                </h6>


            </div>


            <div class="col-lg-4">

                <div class="bg-light rounded p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s"
                    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="input-group">
                        <input type="text" class="form-control p-3" placeholder="Keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>


                <div class="bg-light rounded p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s"
                    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <h3 class="mb-4">@lang('site.services')</h3>
                    <div class="category-list d-flex flex-column">
                        @foreach (\App\Models\Category::all() as $categories => $category)
                        @if ($category->parent == null)
                        <a class="bg-white text-body" href="{{url('category' , ['slug'=>$category->slug ]  )}}">{{ $category->name  ?? ''}} </a></li>
                        @endif
                    @endforeach


                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection
