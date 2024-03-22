
@extends('layouts.site.site')
@section('title', __("site.category"))

@section('sidebar')

    <!--Page Title-->
		<section class="page-title" style="background-image:url('{{ asset('assets/site/images/bg/about-bg.jpg') }}')">
			<div class="auto-container">
				<h2></h2>
				<ul class="page-breadcrumb">
					<li><a href="index.html"></a></li>
					<li> @lang('site.about')</li>
				</ul>
			</div>
		</section>
		<!--End Page Title-->


		<section class="projects-page-section">
            <div class="auto-container">
				<div class="mixitup-gallery">
					<div class="row">
                    @foreach (\App\Models\Category::all() as $category => $cat)
                        <!-- Project Block -->
						<div class="project-block  oil industry col-lg-3 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image">
                                    <img src="{{ asset('uploads/category/'.$cat->image) }}" alt="" />
                                    <!-- Overlay Box -->
                                    <div class="overlay-box">
                                        <div class="icons">
                                            <a class="plus" href="{{ asset('uploads/category/'.$cat->image) }}" data-fancybox="gallery-1" data-caption="">
                                                <span class="flaticon-plus-symbol"></span></a>
                                            <a class="link" href="jericans.html"><span class="icon flaticon-link"></span></a>
                                        </div>
                                        <div class="overlay-inner">
                                            <div class="overlay-content">
                                                <h3><a href="{{url('category/' . $cat->slug  )}}"> {{ $cat->name }}</a></h3>
                                                <div class="category"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                  @endforeach
                </div>
            </div>
            </div>
        </section>




@endsection

