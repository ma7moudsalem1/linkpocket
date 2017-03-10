@extends('layouts.app')
@section('title')
{{ getPageData(6, 'title') }}
@endsection

@section('meta')
<meta name="keywords" content="{{ getPageData(7, 'keywords') }}">
<meta name="description" content="{{ getPageData(7, 'descrip') }}">

<!-- Social media meta -->
<meta property="og:image" content="{{ Request::root().'/public/website/img/'.getImgesByName('social') }}" />
<meta property="og:title" content="{{ 'Contact us - '.getSettings('short').' '.getSettings() }}" />
<meta property="og:descriptio" content="{{ getPageData(7, 'descrip') }}" />
@endsection

@section('content')
<!-- Start Contact Us Section -->
        <section class="contact-us text-center">
                <!-- Start Contact Us Container -->
                <div class="container">
                    <div class="row">
                        <i class="fa fa-headphones fa-5x"></i>
                        <h1>{{ getPageData(7, 'title') }}</h1>
                        {!! getPageData(7, 'body') !!}
                        @include('layouts.message')
                        <!-- Start Contact Form -->
                        {!! Form::open([
                            'method' => 'post',
                            'url'    => '/contact',
                            'role'   => 'form'
                            ]) !!}
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input type="text" name="name" class="form-control input-lg" value="{{ Auth::user() ? Auth::user()->name : '' }}" placeholder="Write Your Name" />
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                </div> 
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="email" name="email" class="form-control input-lg" value="{{ Auth::user() ? Auth::user()->email : '' }}" placeholder="Write Your Email" />
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                    <select class="form-control input-lg" name="type" required>
                                        <option value="" selected>Select subject of the message</option>
                                        @foreach(getTypeMessage() as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                                </div>
                             </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                    <textarea class="form-control input-lg" name="message" placeholder="Leave Your Message"></textarea>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <button class="btn btn-danger input-lg btn-block" type="submit">Send</button>
                            </div>
                         {!! Form::close() !!}
                        <!-- End Contact Form -->     
                    </div> 
                </div>
                <!-- End Contact Us Container -->
        </section>
        <!-- End Contact Us Section -->
@endsection