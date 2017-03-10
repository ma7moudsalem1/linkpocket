@extends('layouts.app')
@section('title')
Follow List
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
        <div class="col-md-9">
            <div class="panel panel-default">
               

                <div class="panel-body">
                   
                     <div class="col-md-4">
                        <div class="well well-sm">
                            <div class="media">
                                <a class="thumbnail pull-left" href="#">
                                    <img class="media-object" src="http://placehold.it/80">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">John Doe</h4>
                                    <p><span class="label label-info">10 photos</span> <span class="label label-primary">89 followers</span></p>
                                    <p>
                                        <a href="#" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-comment"></span> Message</a>
                                        <a href="#" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-heart"></span> Favorite</a>
                                        <a href="#" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Unfollow</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
