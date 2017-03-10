@extends('admin.layouts.master')

@section('title')
  Edit {{ $user->name }}
@endsection

@section('content-header')
  	  <h1>Users Mangement - Edit</h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/adminpanel/users') }}"><i class="fa fa-group"></i> Users</a></li>
        <li class="active">Edit {{ $user->name }}</li>
      </ol>
@endsection

@section('content')
  <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit {{ $user->name }} info</h3>
            <a href="{{ url('/adminpanel/users/create') }}" class="btn btn-success pull-right" style="margin-left:5px"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
            <a href="{{ url('/adminpanel/users/'.$user->id.'/delete') }}" class="btn btn-danger pull-right" ><i class="fa fa-trash" aria-hidden="true"></i></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	<div class="container">
    			<div class="row">
    				 <!-- Start Update Form -->
                {!! 
                Form::model($user, [
                'route' => ['users.update', $user->id], 
                'method' => 'PATCH']) 
                !!}
        				@include('admin.user.form')
              {!! Form::close() !!}
              <!-- End Update Form --> 

               

        		</div> 
         </div>
    	</div>
  </div>

  <div class="box">
        <div class="box-header">
            <h3 class="box-title">Change {{ $user->name }} password</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="container">
            <div class="row">
              <div class="col-md-6"> 
            {!! Form::open([
                    'method' => 'POST',
                    'url' => '/adminpanel/users/chagepassowrd/'
                  ]) 
               !!}
                
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <input type="hidden" value="{{ $user->id }}" name="user_id" />
                  <input id="password" type="password" class="form-control input-lg" name="password" placeholder="Write Your Password" required>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('password') }}</strong>
                        </span>
                        @endif    
                </div>
                </div>
                <div class="col-md-3">
                <button class="btn btn-danger input-lg" style="width:150px" type="submit">Change password</button>

              {!! Form::close() !!}
              </div>
            </div> 
         </div>
      </div>
  </div>
@endsection

@section('footer')
    @include('admin.layouts.message')
@endsection