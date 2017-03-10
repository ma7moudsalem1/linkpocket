@extends('admin.layouts.master')

@section('title')
  Add Slider
@endsection

@section('content-header')
  	  <h1>Slider Mangement - Add</h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/adminpanel/sliders') }}"><i class="fa fa-slider"></i> Sliders</a></li>
        <li class="active">Add Slider</li>
      </ol>
@endsection

@section('content')
  <div class="box">
        <div class="box-header">
            <h3 class="box-title">Add new slider</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	<div class="container">
    			<div class="row">
    				 <!-- Start  Form -->
                    {!! Form::open([
                          'method' => 'POST',
                          'url' => '/adminpanel/sliders',
                          'files' => 'true'
                          ]) 
                    !!}
        				@include('admin.slider.form')
        			   {!! Form::close() !!}
                    <!-- End  Form --> 
        		  </div> 
          </div>
    	</div>
  </div>
@endsection

@section('footer')
<!-- Bootstrap WYSIHTML5 -->
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
  });
</script>
@endsection