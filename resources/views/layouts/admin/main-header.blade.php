        <!--=================================
 header start-->
        <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <!-- logo -->
            <div class="text-left navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href="{{ route('admin.dashbord') }}"><img width="90" src="{{ asset('assets/Admin/images/mlogo.jpg') }}" alt=""></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/Admin/images/logo-icon-dark.png"
                        alt=""></a>
            </div>
            <!-- Top bar left -->
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                        href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                </li>




            </ul>
            <!-- top bar right -->
            <ul class="nav navbar-nav ml-auto">


                @if (app()->getLocale() == 'ar')
                <li class="nav-item"><a class="nav-link nav-pill py-4" style="color:black;"
                        href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"
                        rel="alternate" hreflang="{{ LaravelLocalization::getCurrentLocaleRegional() }}">
                        ENGLISH</a></li>
            @else
                <li class="nav-item"><a class="nav-link nav-pill py-4" style="color:black;"
                        href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"
                        rel="alternate" hreflang="{{ LaravelLocalization::getCurrentLocaleRegional() }}">
                        عربى</a></li>
            @endif



                <li class="nav-item dropdown mr-30">
                    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('assets/Admin/images/mlogo.jpg') }}" alt="avatar">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-0">{{auth('admin')->user()->name}}</h5>
                                    <span>{{auth('admin')->user()->email}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="text-danger ti-unlock"></i>Logout</a>
                        <form id="logout-form" action="{{route('admin.logout')}}" method="POST" style="display: none;">
                             @csrf
                         </form>
                    </div>
                </li>
            </ul>
        </nav>

        <!--=================================
 header End-->
