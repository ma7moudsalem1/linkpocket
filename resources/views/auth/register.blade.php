@extends('layouts.app')

@section('title')
{{ getPageData(14, 'title') }}
@endsection

@section('meta')
<meta name="keywords" content="{{ getPageData(14, 'keywords') }}">
<meta name="description" content="{{ getPageData(14, 'descrip') }}">

<!-- Social media meta -->
<!--<meta property="og:image" content="'Social Share')) }}" />-->
<meta property="og:title" content="{{ getPageData(13, 'title') .getSettings('short').' '.getSettings() }}" />
<meta property="og:description" content="{{ getPageData(13, 'descrip') }}" />
@endsection


@section('header')
    <style type="text/css">
    .register{
        padding: 40px;  
        min-height: 450px
    }
    .register button{
        width: 150px;
        margin: 0 auto
    }
    </style>
@endsection

@section('content')
<section class="register text-center">
        
<!-- Start Contact Us Container -->
                <div class="container">
                    <div class="row">
                        <h1>{{ getPageData(14, 'title') }}</h1> or you can <a href="{{ url('/login') }}" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="{{ getPageData(13, 'title') }}">{{ getPageData(13, 'title') }}</a>
                        {!! getPageData(14, 'body') !!}

                        <!-- Start Contact Form -->
                        <form role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input id="name" type="text" class="form-control input-lg" name="name" value="{{ old('name') }}" required autofocus placeholder="Write Your Name" />
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                </div> 
                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <input id="username" type="text" class="form-control input-lg" name="username" value="{{ old('username') }}" required autofocus placeholder="Write Your Username" />
                                 @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input id="email" type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" required autofocus  placeholder="Write Your E-mail" />
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                             </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">                              
                                <select id="gender"  class="form-control input-lg" name="gender">
                                    <option value="0" selected>Male</option>
                                    <option value="1" >Female</option>
                                </select>
                                    @if ($errors->has('gender'))
                                        <span class="help-block">
                                            <strong style="color:red">{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                               
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control input-lg" name="password" placeholder="Write Your Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif    
                                </div>
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control input-lg" name="password_confirmation" placeholder="Confirm Password" required>
                                </div>
                            </div>
                          
                                <button class="btn btn-danger input-lg " type="submit">Register</button>
                      
                         </form>
                        <!-- End Contact Form -->     
                    </div> 
                </div>
        </section>
        <!-- End Contact Us Section -->        
@endsection
