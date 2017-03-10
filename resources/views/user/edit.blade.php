@extends('layouts.app')
@section('title')
My account
@endsection

@section('meta')
<meta name="keywords" content="{{ getSettings('keywords') }}">
<meta name="description" content="{{ getSettings('descrip') }}">

<!-- Social media meta -->
<!--<meta property="og:image" content="'Social Share')) }}" />-->
<meta property="og:title" content="{{ getSettings('short').' '.getSettings() }}" />
<meta property="og:descriptio" content="{{ getSettings('descrip') }}" />
@endsection

@section('content')
<div class="mainbody container-fluid">
    <div class="row">
        @include('layouts.sidebar')    
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            @include('layouts.message')
            <div class="panel panel-default">
                <div class="panel-body">
                     <h6 class="panel-title pull-left" style="font-size:30px;">
                     <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Account</h6>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="panel-title pull-left">Username: <i class="fa fa-at" aria-hidden="true"></i>{{ Auth::user()->username }}<small> [can't change username]</small></h3>
                    
                    <br><br>
                    <form class="form-horizontal" method="POST" action="{{ url('/account') }}">
                    {{ csrf_field() }}
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                        <br />
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <br />
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender">
                            <option value="0" {{  Auth::user()->gender == 0 ? 'selected' : '' }} >Male</option>
                            <option value="1" {{  Auth::user()->gender == 1 ? 'selected' : '' }} >Female</option>
                        </select>
                        @if ($errors->has('gender'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif
                        <br />
                        <label for="bio">Your bio</label>
                        <textarea class="form-control" name="bio" id="bio" rows="3">{{ Auth::user()->bio }}</textarea>
                        <br /><br />
                        <a class="btn btn-default" href="{{ url('/') }}"><i class="fa fa-fw fa-times" aria-hidden="true"></i> Cancel</a>
                        <button class="btn btn-primary" autocomplete="off" data-loading-text="Loading..." id="BTNupdate"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Update Profile</button>
                        </form>
                </div>
            </div>

             <div class="panel panel-default" id="change-password">
                <div class="panel-body">
                     <h6 class="panel-title pull-left" style="font-size:30px;">
                     <i class="fa fa-unlock-alt" aria-hidden="true"></i> Change my password</h6><br /><br />
                     <form class="form-horizontal" method="POST" action="{{ url('/account/password') }}">
                    {{ csrf_field() }}
                    <label for="old">Old Password</label>
                        <input type="password" class="form-control" id="old" name="old">
                         @if ($errors->has('old'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('old') }}</strong>
                            </span>
                        @endif
                    <br />
                    <label for="password">New Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <br /><br />
                    <button id="myButton" data-loading-text="Loading..." class="btn btn-primary"><i class="fa fa-fw fa-check"  aria-hidden="true"></i> Change password</button>
                    </form>
                    <br /><br />
                </div>
            </div> 
            <br /><br />  
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script>
  $('#BTNupdate').on('click', function () {
    var $btn = $(this).button('loading')
    // business logic...
    $btn.button('reset')
  })
</script>
@endsection
