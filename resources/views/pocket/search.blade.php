@extends('layouts.app')
@section('title')
Search
@endsection

@section('meta')
<meta name="keywords" content="{{ getSettings('keywords').', '.$text }}">
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
                     <small class="panel-title pull-left" style="font-size:30px;">
                     <i class="fa fa-folder" aria-hidden="true"></i> Results: {{ $text }}</small>
                </div>
            </div>
            @include('pocket.list')
            <br /><br />  
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
