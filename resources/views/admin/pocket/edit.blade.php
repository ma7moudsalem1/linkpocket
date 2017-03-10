@extends('admin.layouts.master')

@section('title')
  Edit {{ $pocket->name }}
@endsection

@section('content-header')
  	  <h1>Users Mangement - Edit</h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/adminpanel/pockets') }}"><i class="fa fa-folder"></i> Pocket</a></li>
        <li><a href="{{ url('/adminpanel/users/'.$pocket->user->id.'/edit') }}"><i class="fa fa-group"></i> {{ $pocket->user->name }}</a></li>
        <li class="active">Edit {{ $pocket->name }}</li>
      </ol>
@endsection

@section('content')
  <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit {{ $pocket->name }} info</h3>
            <a href="{{ url('/adminpanel/pockets/create') }}" class="btn btn-success pull-right" style="margin-left:5px"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
            <a href="{{ url('/adminpanel/pockets/'.$pocket->id.'/delete') }}" class="btn btn-danger pull-right" ><i class="fa fa-trash" aria-hidden="true"></i></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	<div class="container">
    			<div class="row">
    				 <!-- Start Update Form -->
                {!! 
                Form::model($pocket, [
                'route' => ['pockets.update', $pocket->id], 
                'method' => 'PATCH']) 
                !!}
        				@include('admin.pocket.form')
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