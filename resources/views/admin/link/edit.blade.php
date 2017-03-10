@extends('admin.layouts.master')

@section('title')
  Edit {{ $link->title }}
@endsection

@section('content-header')
  	  <h1>Links Mangement - Edit</h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/adminpanel/pockets/'.$link->pocket->id.'/edit') }}"><i class="fa fa-folder"></i> {{ $link->pocket->name }}</a></li>
        <li><a href="{{ url('/adminpanel/links') }}"><i class="fa fa-link"></i> Links</a></li>
        <li class="active">Edit {{ $link->title }}</li>
      </ol>
@endsection

@section('content')
  <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit {{ $link->title }} info</h3>
            <a href="{{ url('/adminpanel/links/create') }}" class="btn btn-success pull-right" style="margin-left:5px"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
            <a href="{{ url('/adminpanel/links/'.$link->id.'/trash') }}" class="btn btn-warning pull-right" style="margin-left:5px"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            <a href="{{ url('/adminpanel/links/'.$link->id.'/delete') }}" class="btn btn-danger pull-right confirmation" ><i class="fa fa-times" aria-hidden="true"></i></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	<div class="container">
    			<div class="row">
    				 <!-- Start Update Form -->
                {!! 
                Form::model($link, [
                'route' => ['links.update', $link->id], 
                'method' => 'PATCH']) 
                !!}
        				@include('admin.link.form')
              {!! Form::close() !!}
              <!-- End Update Form --> 

               

        		</div> 
         </div>
    	</div>
  </div>


@endsection


@section('footer')

@include('admin.layouts.message')


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
</script>
@endsection