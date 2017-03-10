@extends('layouts.app')
@section('title')
{{ $link->title }}
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
                     <i class="fa fa-edit" aria-hidden="true"></i> Update {{ $link->title }}</h6>

                     <a href="{{ url('/links/create') }}" class="pull-right btn btn-success" style="margin-left:5px"><i class="fa fa-plus" aria-hidden="true"></i></a>
                     <a href="{{ url('/links/'.$link->id.'/delete') }}" class="pull-right btn btn-danger confirmation"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    
            
                {!! Form::model($link, [
                'url'     => ['links/update', $link->id], 
                'method'  => 'PATCH',
                'class'   => 'form-horizontal'
                ]
                
                )!!}

            @include('link.form')
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
