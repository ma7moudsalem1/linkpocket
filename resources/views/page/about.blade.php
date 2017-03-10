@extends('layouts.app')
@section('title')
{{ getPageData(6, 'title') }}
@endsection

@section('meta')
<meta name="keywords" content="{{ getPageData(6, 'keywords') }}">
<meta name="description" content="{{ getPageData(6, 'descrip') }}">

<!-- Social media meta -->
<meta property="og:image" content="{{ Request::root().'/public/website/img/'.getImgesByName('social') }}" />
<meta property="og:title" content="{{ 'About '.getSettings('short').' '.getSettings() }}" />
<meta property="og:description" content="{{ getPageData(6, 'descrip') }}" />
@endsection

@section('content')
<!-- Start Contact Us Section -->
        <section class="contact-us text-center">
                <!-- Start Contact Us Container -->
                <div class="container">
                    <div class="row">
                        <i class="fa fa-headphones fa-5x"></i>
                        <h1>{{ getPageData(6, 'title') }}</h1>
                        {!! getPageData(6, 'body') !!}
                            
                    </div> 
                </div>
                <!-- End Contact Us Container -->
        </section>
        <!-- End Contact Us Section -->
@endsection