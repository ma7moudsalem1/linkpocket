@extends('layouts.app')
@section('title')
{{ $pocket->name }}
@endsection
@section('meta')
<meta name="keywords" content="{{ $pocket->name.','.$pocket->user->name.','.$pocket->user->username.','.getSettings('short').','.getSettings().','.
getSettings('short').' '.getSettings().','.getSettings('protected')
 }}">
<meta name="description" content="{{ $pocket->descrip != null ? $pocket->descrip : 'Protected pocket created by'.$pocket->user->name }}">

<!-- Social media meta -->
<meta property="og:image" content="{{ GetPocketImage($pocket->type) }}" />
<meta property="og:title" content="{{ $pocket->name }}" />
<meta property="og:descriptio" content="{{ $pocket->descrip != null ? $pocket->descrip : 'Protected pocket created by'.$pocket->user->name }}" />
@endsection
@section('content')
<div class="mainbody container-fluid">
    <div class="row">
        @include('layouts.sidebar')    
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            @include('layouts.message')
            
            <div class="panel panel-default">
                <div class="panel-body">
                     <h1 class="panel-title pull-left" style="font-size:18px;">
                     <i class="fa fa-folder" aria-hidden="true"></i> {{ $pocket->name }} pocket is protected please enter password</h1>
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-body">
                    
                   {!! Form::open([
                          'method'  => 'POST',
                          'url'     => '/pockets/'.$pocket->id.'/show',
                          'class'   => 'form-horizontal'
                          ]) 
                    !!}
                      <input type="hidden" name="pocket_id" value="{{ $pocket->id }}">
                      <label for="password">Password</label>
                      <input id="password" type="password" class="form-control" name="password" placeholder="Write Your Password"> 
                      <br /><br />
                      <button class="btn btn-primary" autocomplete="off" data-loading-text="Loading..." id="BTNupdate"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Ok</button>
            
            {!! Form::close() !!}
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script type="text/javascript">

  var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure You Want to delete this?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>

@endsection
