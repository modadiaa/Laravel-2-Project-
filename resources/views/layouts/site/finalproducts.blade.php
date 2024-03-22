
@extends('layouts.site.site')
@section('title', __("site.category"))

@section('sidebar')
    <!--Page Title-->
		<section class="page-title" style="background-image:url('{{ asset('assets/site/images/bg/about-bg.jpg') }}')">
			<div class="auto-container">
				<h2>@lang('site.about')</h2>
				<ul class="page-breadcrumb">
					<li><a href="index.html">@lang('site.home')</a></li>
					<li> @lang('site.about')</li>
				</ul>
			</div>
		</section>
		<!--End Page Title-->

            <div class="sidebar-page-container">
                <div class="auto-container">
                    <div class="row clearfix">
                        <!--Content Side-->
                        <div class="content-side col-lg-12 col-md-12 col-sm-12">
                            <!--Shop Single-->
                            <div class="shop-section">
                                <div class="our-shops">
                                    <div class="row clearfix">


                                        @foreach (\App\Models\Product::with('category')->get() as $product => $prod)
                                          @if ( $category->id == $prod->category->id)

                                                    <div class="shop-item col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="inner-box">
                                                            <div class="image">
                                                                <img src="{{ asset('uploads/products/'.$prod->image ?? '') }}" alt="" />
                                                                <div class="overlay-box">
                                                                    <ul class="cart-option">
                                                                        <li><a href="{{ asset('uploads/products/'.$prod->image  ?? '') }}"
                                                                                data-fancybox="images" data-caption=""
                                                                                class="link"><span class="icon fa fa-search"></span></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="lower-content clearfix">
                                                                <div class="pull-left">
                                                                    <h6>{{ $prod->name  }}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                            {{-- @php
                                                dd( $category);
                                            @endphp --}}
                                            @endif

                                            @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection

