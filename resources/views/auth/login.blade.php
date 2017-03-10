@extends('layouts.app')

@section('title')
{{ getPageData(13, 'title') }}
@endsection

@section('meta')
<meta name="keywords" content="{{ getPageData(13, 'keywords') }}">
<meta name="description" content="{{ getPageData(13, 'descrip') }}">

<!-- Social media meta -->
<!--<meta property="og:image" content="'Social Share')) }}" />-->
<meta property="og:title" content="{{ getPageData(13, 'title') .getSettings('short').' '.getSettings() }}" />
<meta property="og:description" content="{{ getPageData(13, 'descrip') }}" />
@endsection

@section('header')
    <style type="text/css">
    .register{
        padding: 40px;  
        min-height: 350px
    }
    .register button{
        width: 150px;
    }
    </style>
@endsection

@section('content')
<section class="register">     
<!-- Start Contact Us Container -->
                <div class="container">
                    <div class="row">
                        <h1>{{ getPageData(13, 'title') }}</h1>
                        {!! getPageData(13, 'body') !!} 
                        
                        <!-- Start Contact Form -->
                        <form role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <input id="username" type="text" class="form-control input-lg" name="username" value="{{ old('username') }}" required autofocus placeholder="Username" />
                                 @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control input-lg" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif    
                                </div>
                            </div>
                             <div class="col-md-4">
                                <button class="btn btn-danger input-lg " type="submit">Login</button><br />
                                
                            </div>
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                           <div class="col-md-12">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                            </a>
                            <a href="{{ url('/register') }}" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="{{ getPageData(14, 'title') }}">I don't have account</a>
                            </div>
                         </form>
                        <!-- End Contact Form -->     
                    </div> 
                </div>
        </section>
        <!-- End Contact Us Section -->        
@endsection
