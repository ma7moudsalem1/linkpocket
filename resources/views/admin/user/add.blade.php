@extends('admin.layouts.master')

@section('title')
  Add User
@endsection

@section('content-header')
  	  <h1>Users Mangement - Add</h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/adminpanel/users') }}"><i class="fa fa-group"></i> Users</a></li>
        <li class="active">Add User</li>
      </ol>
@endsection

@section('content')
  <div class="box">
        <div class="box-header">
            <h3 class="box-title">Add new user</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	<div class="container">
    			<div class="row">
    				 <!-- Start Contact Form -->
                    {!! Form::open([
                          'method' => 'POST',
                          'url' => '/adminpanel/users'
                          ]) 
                    !!}
        				@include('admin.user.form')
        			   {!! Form::close() !!}
                    <!-- End Contact Form --> 
        		  </div> 
          </div>
    	</div>
  </div>
@endsection