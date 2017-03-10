@extends('layouts.app')
@section('title')
My numbers
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
                     <h6 class="panel-title pull-left" style="font-size:18px;">
                     <i class="fa fa-pencil-square-o" aria-hidden="true"></i> My numbers</h6>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="panel-title pull-left">{{ Auth::user()->name }} this is your numbers</h3><br /><br />
                    
                    <b>Created pockets: </b> {{ $pockets }} <br /><br />
                    <b>You have shared: </b> {{ $shares > 0 ? $shares .' pockets' : 'You have nothing shared yet' }} <br /><br />
                    @if(! is_numeric($shareTime))
                    <b>Last pocket you have shared at: </b>  {{ $shareTime }}<br /><br />
                    @endif
                    <b>You follow: </b> {{ $follow . ' person' }}<br /><br />
                    @if(! is_numeric($followTime))
                    <b>Last pocket you have shared at: </b>  {{ $followTime }}<br /><br />
                    @endif
                    

                  
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
