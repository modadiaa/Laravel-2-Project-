<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <li>
                        <a href="{{ route('admin.dashbord') }}"><i class="ti-home"></i><span class="right-nav-text">@lang('site.dashboard')</span> </a>
                    </li>


                     <!-- Sliders -->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#slider">
                            <div class="pull-left">
                                <i class="ti-user"></i>
                                <span class="right-nav-text">@lang('site.slider')</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="slider" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('sliders.index')}}">@lang('site.slider')</a></li>
                        </ul>
                    </li>


                     <!-- About -->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#about">
                            <div class="pull-left">
                                <i class="ti-user"></i>
                                <span class="right-nav-text"> @lang('site.about')</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="about" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('about.index')}}">@lang('site.about') </a></li>
                        </ul>
                    </li>


                    <!-- category -->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#mainCat-menu">
                                <div class="pull-left">
                                    <i class="ti-user"></i>
                                    <span class="right-nav-text">@lang('site.categories')</span>
                                </div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="mainCat-menu" class="collapse" data-parent="#sidebarnav">
                                <li><a href="{{route('categories.index')}}">@lang('site.categories')</a></li>
                            </ul>
                        </li>
                    <!-- products -->
                        <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#products">
                            <div class="pull-left">
                                <i class="ti-user"></i>
                                <span class="right-nav-text">@lang('site.products')</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="products" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('products.index')}}">@lang('site.products')</a></li>
                        </ul>
                    </li>

                    <!-- users
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
                            <div class="pull-left">
                                <i class="ti-user"></i>
                                <span class="right-nav-text">المستخدمين</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users" class="collapse" data-parent="#sidebarnav">
                            <li><a href="">المستخدمين</a></li>
                        </ul>
                    </li>


                    users -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#gallery">
                            <div class="pull-left">
                                <i class="ti-user"></i>
                                <span class="right-nav-text"> @lang('site.works')</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="gallery" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('works.index')}}">@lang('site.works') </a></li>
                        </ul>
                    </li>


                     <!-- users -->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#new">
                            <div class="pull-left">
                                <i class="ti-user"></i>
                                <span class="right-nav-text"> @lang('site.news') </span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="new" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('news.index')}}">@lang('site.news')  </a></li>
                        </ul>
                    </li>



                    <!-- videos -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#video">
                            <div class="pull-left">
                                <i class="ti-user"></i>
                                <span class="right-nav-text"> @lang('site.videos') </span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="video" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('video.index')}}">@lang('site.videos')  </a></li>
                        </ul>
                    </li>

                     <!-- message -->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#form">
                            <div class="pull-left">
                                <i class="ti-user">  </i>
                                <span class="right-nav-text"> @lang('site.message')   </span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="form" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('message.index')}}">@lang('site.message')  </a></li>
                        </ul>
                    </li>


                     <!-- users -->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#contact">
                            <div class="pull-left">
                                <i class="ti-user">  </i>

                                <span class="right-nav-text"> @lang('site.contact')   </span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="contact" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('contacts.index')}}">@lang('site.contact')  </a></li>
                        </ul>
                    </li>


                    <!-- users -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#setting">
                            <div class="pull-left">
                                <i class="ti-user">  </i>

                                <span class="right-nav-text"> @lang('site.setting')   </span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="setting" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('settings.index')}}">@lang('site.setting')  </a></li>
                        </ul>
                    </li>





                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
