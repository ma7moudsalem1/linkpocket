@extends('admin.layouts.master')

@section('title')
  Website Settings
@endsection

@section('content-header')
  	  <h1>Site Settings</h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Site Settings</li>
      </ol>
@endsection

@section('content')
  <div class="box">
      <div class="box-header">
            <h3 class="box-title">Update website settings</h3>
      </div>
        <!-- /.box-header -->
        <div class="box-body">
           <div class="container">
    			    <div class="row">
    				    <!-- Start  Form -->
                {!! Form::open([
                        'url' => '/adminpanel/settings',
                        'method', 'POST'
                        ]) !!}
                @foreach($siteSetting as $setting)
                  <div class="col-md-7">
                    <h4>{{ $setting->slug }}</h4>
                    @if($setting->type == 1)
                    {!! Form::text($setting->name, $setting->value, ['class' => 'form-control input-lg']) !!}
                    @elseif($setting->type == 2)
                    {!! Form::textarea($setting->name, $setting->value, ['class' => 'form-control input-lg']) !!}
                    @else
                    {!! Form::color($setting->name, $setting->value, ['class' => 'form-control input-lg']) !!}
                    @endif

                    @if ($errors->has($setting->name))
                    <span class="help-block">
                      <strong style="color:red">{{ $errors->first($setting->name) }}</strong>
                    </span>
                    @endif   
                  </div>
                @endforeach
                <div class="col-md-12">
                <br /><br />
                <a href="{{ url('/adminpanel/images') }}">Manage Images</a>
                <br /><br />
                  <button class="btn btn-danger input-lg" style="width:150px" type="submit">Done</button>
                <br /><br />
                </div>
                {!! Form::close() !!}
                <!-- End  Form --> 
        		  </div> 
          </div>
    	</div>
  </div>
@endsection
@section('footer')
@include('admin.layouts.message')
@endsection