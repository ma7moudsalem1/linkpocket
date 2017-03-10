@extends('layouts.app')

@section('title')
    Welcome visitor
@endsection
@section('meta')
<meta name="keywords" content="{{ getSettings('keywords') }}">
<meta name="description" content="{{ getSettings('descrip') }}">

<!-- Social media meta -->
<meta property="og:image" content="{{ Request::root().'/public/website/img/'.getImgesByName('social') }}" />
<meta property="og:title" content="{{ getSettings('short').' '.getSettings() }}" />
<meta property="og:descriptio" content="{{ getSettings('descrip') }}" />
@endsection
@section('content')
    <!-- Start Slider Carousel -->
        <div id="myslide" class="carousel slide hidden-xs" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
          @foreach($sliders as $key => $slider)
            <li data-target="#myslide" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
          @endforeach
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
          @foreach($sliders as $key => $slider)
            <div class="item {{  $key == 0 ? 'active' : '' }}">
              <img src="{{ Request::root().'/public/website/img/slider/'.$slider->img }}" alt="Slider image {{ $key }}">
              <div class="carousel-caption hidden-xs">
              {!! $slider->body !!}
              </div>
            </div>
            @endforeach
        
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#myslide" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myslide" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <!-- End Slider Carousel -->

        <!-- Start About Section -->
        <section class="about text-center" id="about">
            <div class="container">
                <h1 class="hidden-xs"> {{ getPageData(15, 'title') }} <span>{{ getSettings().' '.getSettings('short') }}</span></h1>
                <h3 class="visible-xs">{{ getPageData(15, 'title') }}  <span>{{ getSettings().' '.getSettings('short') }}</span></h3>
                {!! getPageData(15, 'body') !!} 
            </div>
        </section>
        <!-- End About section -->

        <!-- Start About section -->
        <section class="features text-center" id="features">
            <div class="container">
                <h1>Our Features</h1>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="feat">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            <h3>{{ getPageData(1, 'title') }}</h3>
                            {!! getPageData(1, 'body') !!}
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="feat">
                            <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                            <h3>{{ getPageData(2, 'title') }}</h3>
                            {!! getPageData(2, 'body') !!}
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="feat">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                            <h3>{{ getPageData(3, 'title') }}</h3>
                            {!! getPageData(3, 'body') !!}
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="feat">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            <h3>{{ getPageData(4, 'title') }}</h3>
                            {!! getPageData(4, 'body') !!}
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
        <!-- End About section -->

       
    
        <!-- Start Stats Section  -->
        <section class="stats text-center">
            <div class="stats_inside">
                <!-- Start Stats Container  -->
                <div class="container">
                    <h1>Our Statistics</h1>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="stats_data">
                                <i class="fa fa-users fa-5x"></i>
                                <p>{{ number_format($members) }}</p>
                                <span>Active Members</span>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-sm-6">
                            <div class="stats_data">
                                <i class="fa fa-folder fa-5x"></i>
                                <p>{{ number_format($pockets) }}</p>
                                <span>Created Pockets</span>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-sm-6">
                            <div class="stats_data">
                                <i class="fa fa-link fa-5x"></i>
                                <p>{{ number_format($links) }}</p>
                                <span>Created Links</span>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-sm-6">
                            <div class="stats_data">
                                <i class="fa fa-share fa-5x"></i>
                                <p>{{ number_format($shares) }}</p>
                                <span>Shared Pockets</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Stats Container  -->
            </div>
        </section>
        <!-- End Stats Section  -->
    
        <!-- Start Our Skills Section -->
        <section class="our-skills text-center">
            <!-- Start Our skills Container -->
            <div class="container">
                <div class="row">
                    <!-- Start Team Info -->
                    <div class="col-md-12">
                        <div class="team-info">
                            <h3>{{ getPageData(5, 'title') }}</h3>
                            {!! getPageData(5, 'body') !!}
                            <a href="{{ url('/about') }}" title="Read More" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    <!-- Start Team Info -->
                </div>
            </div>
            <!-- Start Our skills Container -->
        </section>
        <!-- End Our Skills Section -->
        
        >
        
    
        <!-- Start Footer Section -->
        <section class="footer">
            <!-- Start Footer Container -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <h3>{{ getSettings().' '.getSettings('short') }}</h3>
                        <ul class="list-unstyled three-columns">
                            <li><a href="{{ url('/') }}" title="Home">Home</a></li>
                            <li><a href="{{ url('/login') }}" title="Sign In">Sign In</a></li>
                            <li><a href="{{ url('/register') }}" title="Sign Up">Sign Up</a></li>
                            <li><a href="{{ url('/about') }}" title="About">About</a></li>
                            <li><a href="{{ url('/contact') }}" title="Contact Us">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h3>What you can do with us</h3>
                        <div class="media">
                            <a class="pull-left" href="{{ url('/about') }}" title="{{ getPageData(10, 'title') }}">
                                <img class="media-object" src="{{ Request::root().'/public/website/img/'.getImgesByName('pocket') }}" alt="image {{ getPageData(9, 'title') }}" />
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{ getPageData(10, 'title') }}</h4>
                                {!! getPageData(10, 'body') !!}
                            </div>
                        </div>
                        <div class="media">
                            <a class="pull-left" href="{{ url('/about') }}" title="{{ getPageData(9, 'title') }}">
                                <img class="media-object" src="{{ Request::root().'/public/website/img/'.getImgesByName('link') }}" alt="image {{ getPageData(9, 'title') }}" />
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{ getPageData(9, 'title') }}</h4>
                                {!! getPageData(9, 'body') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br />
        <!-- Start Scroll To Top -->
        <div id="scroll-top">
          <i class="fa fa-chevron-up fa-3x"></i>
        </div>
        <!-- End Scroll To Top -->
@endsection