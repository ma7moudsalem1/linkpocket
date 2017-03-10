@extends('admin.layouts.master')

@section('title')
  Add Pocket
@endsection

@section('content-header')
  	  <h1>Pocket Mangement - Add</h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/adminpanel/pockets') }}"><i class="fa fa-folder"></i> Pockets</a></li>
        <li class="active">Add Pocket</li>
      </ol>
@endsection

@section('content')
  <div class="box">
        <div class="box-header">
            <h3 class="box-title">Add new pocket</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	<div class="container">
    			<div class="row">
    				 <!-- Start  Form -->
                    {!! Form::open([
                          'method' => 'POST',
                          'url' => '/adminpanel/pockets'
                          ]) 
                    !!}
        				@include('admin.pocket.form')
        			   {!! Form::close() !!}
                    <!-- End  Form --> 
        		  </div> 
          </div>
    	</div>
  </div>
@endsection

@section('footer')
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