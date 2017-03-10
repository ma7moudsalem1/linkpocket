@extends('admin.layouts.master')

@section('title')
  Add Link
@endsection

@section('content-header')
  	  <h1>Links Mangement - Add</h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/adminpanel/pockets') }}"><i class="fa fa-link"></i> Links</a></li>
        <li class="active">Add Link</li>
      </ol>
@endsection

@section('content')
  <div class="box">
        <div class="box-header">
            <h3 class="box-title">Add new link</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	<div class="container">
    			<div class="row">
    				 <!-- Start  Form -->
                    {!! Form::open([
                          'method' => 'POST',
                          'url' => '/adminpanel/links'
                          ]) 
                    !!}
        				@include('admin.link.form')
        			   {!! Form::close() !!}
                    <!-- End  Form --> 
        		  </div> 
          </div>
    	</div>
  </div>
@endsection

