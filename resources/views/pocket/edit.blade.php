@extends('layouts.app')
@section('title')
{{ $pocket->name }}
@endsection

@section('meta')
<meta name="keywords" content="{{ $pocket->name.','.$pocket->user->name.','.$pocket->user->username.','.getSettings('short').','.getSettings().','.
getSettings('short').' '.getSettings()
 }}">
<meta name="description" content="{{ $pocket->descrip != null ? $pocket->descrip : 'pocket created by'.$pocket->user->name }}">

<!-- Social media meta -->
<meta property="og:image" content="{{ Request::root().'/public/website/img/'.getImgesByName('social') }}" />
<meta property="og:title" content="{{ $pocket->name }}" />
<meta property="og:descriptio" content="{{ $pocket->descrip != null ? $pocket->descrip : 'pocket created by'.$pocket->user->name }}" />
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
                     <i class="fa fa-edit" aria-hidden="true"></i> Update {{ $pocket->name }}</h6>

                     <a href="{{ url('/pockets/create') }}" class="pull-right btn btn-success" style="margin-left:5px"><i class="fa fa-plus" aria-hidden="true"></i></a>
                     <a href="{{ url('/pockets/'.$pocket->id.'/delete') }}" class="pull-right btn btn-danger confirmation"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    
            
                {!! Form::model($pocket, [
                'url'     => ['pockets/update', $pocket->id], 
                'method'  => 'PATCH',
                'class'   => 'form-horizontal'
                ]
                
                )!!}

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
    var sel = $('#dbType').val();
  if(sel == 1)
  {
    $("#passType").show();
    $("#passType").attr("required")
  }
  $('#dbType').on('change',function(){
     var selection = $(this).val();
    switch(selection){
    case "1":
    $("#passType").show();
    $("#passType").attr("required")
   break;
    default:
    $("#passType").hide()
    }
});

  var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure You Want to delete this?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>

@endsection
