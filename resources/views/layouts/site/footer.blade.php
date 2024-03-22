
    <!-- Footer Start -->

    <div class="container-fluid bg-dark text-secondary footer  py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">

                <div class="col-lg-3 col-md-6">

                    <h5 class="text-light mb-4 jk"> @lang('site.addresss')</h5>
                    @foreach (\App\Models\Contact::all() as $contacts => $contact)
                      @if (app()->getLocale() == 'en')
                          <p class="mb-2 jk"><i class="fa fa-map-marker-alt me-3"></i>{!! $contact->address !!}</p>
                          <p class="mb-2 jk"><i class="fa fa-phone-alt me-3"></i>{{  $contact->mobile  }}</p>
                        <p class="mb-2 jk"><i class="fa fa-envelope me-3"></i>{{  $contact->email  }}</p>
                        @else
                          <p class="mb-2 jk"><i class="fa fa-map-marker-alt ms-3"></i>{!! $contact->address !!}</p>
                          <p class="mb-2 jk"><i class="fa fa-phone-alt ms-3"></i>{{  $contact->mobile  }}</p>
                          <p class="mb-2 jk"><i class="fa fa-envelope ms-3"></i>{{  $contact->email  }}</p>
                      @endif




                    @endforeach

                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-2" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-2" href="{{ $contact->Facebook }}"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-2" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-secondary rounded-circle me-2" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">@lang('site.links')</h5>
                    <a class="btn btn-link" href="">  @lang('site.index') </a>
                    <a class="btn btn-link" href="">  @lang('site.about') </a>
                    <a class="btn btn-link" href="{{ url('category') }}">  @lang('site.services')</a>
                    <a class="btn btn-link" href="{{ url('work') }}">  @lang('site.works') </a>
                    <a class="btn btn-link" href="{{ url('new') }}">  @lang('site.news') </a>
                    <a class="btn btn-link" href="{{ url('video') }}">  @lang('site.video')</a>
                    <a class="btn btn-link" href="{{ url('contact') }}">  @lang('site.contact')</a>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h5 class="text-light mb-4">@lang('site.map')</h5>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3444.689741306279!2d31.7516737!3d30.302893!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9fcde92ed0ab2a56!2zMzDCsDE4JzEwLjQiTiAzMcKwNDQnNTguMiJF!5e0!3m2!1sar!2seg!4v1671141171341!5m2!1sar!2seg"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->



    <!-- Copyright Start -->
    <div class="container-fluid py-4" style="background: #000000;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Powered By Ittsoft</a>
                </div>

            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>
