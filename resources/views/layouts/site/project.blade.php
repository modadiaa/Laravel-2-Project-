 <!-- Team Start -->
 <div class="container-xxl py-5 ll">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <div class="bg-primary mb-3 mx-auto" style="width: 60px; height: 2px;"></div>
            <h1 class="display-5 mb-5">@lang('site.services')</h1>
        </div>
        <div class="row g-4">

            @foreach (\App\Models\Category::get() as $category => $cat)
            @if ($cat->parent == null)
            <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item">
                    <div class="overflow-hidden position-relative">
                        <img class="img-fluid" src=" {{asset('uploads/category/'.$cat->image)}} " alt="">
                        <div class="team-social">
                            <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-dark rounded-circle m-1" href=""><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <a href="{{ url('category/'.$cat->slug) }}">
                            <h5 class="mb-0"> {{ $cat->name }} </h5>
                        </a>
                        <span class="text-primary">{{ $cat->description }}  </span>
                    </div>
                </div>
            </div>

            @endif
        @endforeach





        </div>



    </div>
</div>
<!-- Team End -->
