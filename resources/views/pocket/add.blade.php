@extends('layouts.app')
@section('title')
Add Pocket
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
<div class="mainbody container-fluid">
    <div class="row">
        @include('layouts.sidebar')    
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            @include('layouts.message')
            <div class="panel panel-default">
                <div class="panel-body">
                     <h6 class="panel-title pull-left" style="font-size:30px;">
                     <i class="fa fa-plus" aria-hidden="true"></i> Add Pocket</h6>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    
            {!! Form::open([
                          'method'  => 'POST',
                          'url'     => '/pockets/store',
                          'class'   => 'form-horizontal'
                          ]) 
            !!}
            @include('pocket.form')
            {!! Form::close() !!}
                  
                </div>
            </div>
           
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

    $('#dbType').on('change',function(){
     var selection = $(this).val();
    switch(selection){
    case "1":
    $("#passType").show()
   break;
    default:
    $("#passType").hide()
    }
});
</script>
<script type="text/javascript">
   $('#dbType').on('change',function(){
     var selection = $(this).val();
    switch(selection){
    case "1":
    $("#passType").show()
   break;
    default:
    $("#passType").hide()
    }
});
</script>

@endsection
