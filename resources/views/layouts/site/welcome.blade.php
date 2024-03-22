  <!-- About Start -->
  <div class="container-fluid bg-light overflow-hidden  px-lg-0" style="height: auto;">
    <div class="container about px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 ps-lg-0" style="min-height: 400px;">
                <div class="position-relative h-100">
                    @foreach (\App\Models\About::get() as $about => $abou)
                     @if($abou->id === 1)
                        <img class="position-absolute img-fluid w-100 h-100" src="{{asset('uploads/about/'.$abou->image)}}"
                        style="object-fit: cover;" alt="">
                     @endif
                     @endforeach
                </div>
            </div>
            <div class="col-lg-6 about-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg-5 pe-lg-0">
                    <div class="bg-primary mb-3" style="width: 60px; height: 2px;"></div>
                    @foreach (\App\Models\About::get() as $about => $abou)
                       @if($abou->id === 1)
                        <h1 class="display-5 mb-2">  {{ $abou->name }}</h1>
                        <h6 class="display-6 mb-2">  {{ $abou->title }} </h6>
                        <h6 class="mb-2 pb-2 kl" >    {!! $abou->description !!} </h6>
                        @endif
                    @endforeach

                    <a href="{{ url('abouts') }}" class="btn btn-primary rounded-pill py-3 px-5"> More</a>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- About End -->
