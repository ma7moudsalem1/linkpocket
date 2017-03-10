@extends('layouts.app')
@section('title')
Home
@endsection

@section('meta')
<meta name="keywords" content="{{ getSettings('keywords') }}">
<meta name="description" content="{{ getSettings('descrip') }}">

<!-- Social media meta -->
<meta property="og:image" content="{{ Request::root().'/public/website/img/'.getImgesByName('social') }}" />
<meta property="og:title" content="{{ getSettings() }}" />
<meta property="og:descriptio" content="{{ getSettings('descrip') }}" />
@endsection

@section('content')
<div class="mainbody container-fluid">
    <div class="row">
        @include('layouts.sidebar')    
        <div class="col-md-9">
            <div class="panel panel-default">
               

                <div class="panel-body">
                   @include('pocket.list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
