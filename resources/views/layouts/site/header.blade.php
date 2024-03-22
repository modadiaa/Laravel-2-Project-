<!-- Topbar Start -->
<div class="container-fluid bg-dark px-5">
    <div class="row gx-4 d-none d-lg-flex">
        @foreach (\App\Models\Contact::all() as $contacts => $contact)
        @if (App::getLocale() == 'en')
        <div class="col-lg-6 text-start">
            <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                <div class="btn-sm-square rounded-circle bg-primary me-2">
                    <small class="fa fa-map-marker-alt text-white"></small>
                </div>
                <small>{!! $contact->address !!}</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center py-3">
                <div class="btn-sm-square rounded-circle bg-primary me-2">
                    <small class="fa fa-envelope-open text-white"></small>
                </div>
                <small>{{  $contact->email  }}</small>
            </div>
        </div>
        @else
        <div class="col-lg-6 text-end">


        <div class="h-100 d-inline-flex align-items-center py-3 ms-4">
            <div class="btn-sm-square rounded-circle bg-primary ms-2">
                <small class="fa fa-map-marker-alt text-white"></small>
            </div>


            <small>{!! $contact->address !!}</small>
        </div>
        <div class="h-100 d-inline-flex align-items-center py-3">
            <div class="btn-sm-square rounded-circle bg-primary ms-2">
                <small class="fa fa-envelope-open text-white"></small>
            </div>
            <small>{{  $contact->email  }}</small>
        </div>
    </div>

        @endif
        @endforeach




        @foreach (\App\Models\Contact::all() as $contacts => $contact)
        @if (App::getLocale() == 'en')
        <div class="col-lg-6 text-end">
            <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                <div class="btn-sm-square rounded-circle bg-primary me-2">
                    <small class="fa fa-phone-alt text-white"></small>
                </div>
                <small>{{  $contact->phone  }}</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center py-3">
                <div class="btn-sm-square rounded-circle bg-primary me-2">
                    <small class="far fa-clock text-white"></small>
                </div>
                <small>{{  $contact->workk  }}</small>
            </div>
        </div>
        @else
        <div class="col-lg-6 text-start">
            <div class="h-100 d-inline-flex align-items-center py-3 ms-4">
                <div class="btn-sm-square rounded-circle bg-primary ms-2">
                    <small class="fa fa-phone-alt text-white"></small>
                </div>
                <small>{{  $contact->phone  }}</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center py-3">
                <div class="btn-sm-square rounded-circle bg-primary ms-2">
                    <small class="far fa-clock text-white"></small>
                </div>
                <small>{{  $contact->workk  }}</small>
            </div>
        </div>

        @endif
        @endforeach



    </div>
</div>
<!-- Topbar End -->


   <!-- Navbar Start -->
   <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 px-4 px-lg-5">
    <a href="index.html" class="">
        <img src="{{ asset('assets/site/img/logo/logo.jpg') }}" alt="">
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-4 py-lg-0">
            <a href="/" class="nav-item nav-link active"> @lang('site.home')</a>
            <a href="{{ url('abouts') }}" class="nav-item nav-link">@lang('site.about')</a>
            <div class="nav-item dropdown">
                <a href="services.html" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">@lang('site.services') </a>
                <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                    @foreach (\App\Models\Category::all() as $categories => $category)
                        @if ($category->parent == null)
                        <a class="dropdown-item" href="{{url('category' , ['slug'=>$category->slug ]  )}}">{{ $category->name  ?? ''}} </a></li>
                        @endif
                    @endforeach


                </div>

            </div>
            <a href="{{ url('work') }}" class="nav-item nav-link">  @lang('site.works')</a>
            <a href="{{ url('new') }}" class="nav-item nav-link"> @lang('site.news')</a>
            <a href="{{ url('video') }}" class="nav-item nav-link"> @lang('site.video')</a>
            <a href="{{ url('contact') }}" class="nav-item nav-link"> @lang('site.contact Us')</a>
            @if (app()->getLocale() == 'en')
            <a class="nav-item nav-link" style=""
                    href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"
                    rel="alternate" hreflang="{{ LaravelLocalization::getCurrentLocaleRegional() }}">
                    عربى</a>
        @else
            <a class="nav-item nav-link" style=""
                    href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"
                    rel="alternate" hreflang="{{ LaravelLocalization::getCurrentLocaleRegional() }}">
                    EN</a>
        @endif


        </div>

        @foreach (\App\Models\Contact::all() as $contacts => $contact)
            @if (app()->getLocale() == 'en')
            <div class="h-100 d-lg-inline-flex align-items-center d-none">
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href="{{ $contact->Facebook }}"><i
                        class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href="{{ $contact->twitter }}"><i
                        class="fab fa-twitter"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href="{{ $contact->twitter }}"><i
                        class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-0" href="{{ $contact->twitter }}"><i
                        class="fab fa-instagram"></i></a>
            </div>
            @else
            <div class="h-100 d-lg-inline-flex align-items-center d-none">
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href="{{ $contact->Facebook }}"><i
                        class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href="{{ $contact->twitter }}"><i
                        class="fab fa-twitter"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href="{{ $contact->twitter }}"><i
                        class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href="{{ $contact->twitter }}"><i
                        class="fab fa-instagram"></i></a>
            </div>
            @endif
        @endforeach



    </div>
</nav>
<!-- Navbar End -->
