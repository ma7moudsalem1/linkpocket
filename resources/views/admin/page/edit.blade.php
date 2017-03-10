@extends('admin.layouts.master')

@section('title')
  Edit {{ $page->title }}
@endsection

@section('content-header')
  	  <h1>pages Mangement - Edit</h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/adminpanel/pages') }}"><i class="fa fa-page"></i> pages</a></li>
        <li class="active">Edit {{ $page->title }}</li>
      </ol>
@endsection

@section('content')
  <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit {{ $page->title }} info</h3>
        <!-- /.box-header -->
        <div class="box-body">
        	<div class="container">
    			<div class="row">
    				 <!-- Start Update Form -->
                {!! 
                Form::model($page, [
                   'method'  => 'PATCH',
                   'url'     => '/adminpanel/pages/update',
                   'class'   => 'form-horizontal'
                ]) 
                !!}
        				@include('admin.page.form')
              {!! Form::close() !!}
              <!-- End Update Form --> 

               

        		</div> 
         </div>
    	</div>
  </div>


@endsection


@section('footer')

@include('admin.layouts.message')

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