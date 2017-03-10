@extends('admin.layouts.master')

@section('title')
  Edit {{ $websiteImage->name }}
@endsection

@section('content-header')
      <h1>Images Mangement - Edit</h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/adminpanel/settings') }}"><i class="fa fa-cogs"></i> Site Settings</a></li>
        <li><a href="{{ url('/adminpanel/images') }}"><i class="fa fa-image"></i> images</a></li>
        <li class="active">Edit {{ $websiteImage->name }}</li>
      </ol>
@endsection

@section('content')
  <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit {{ $websiteImage->name }} Photo</h3>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="container">
          <div class="row">

            <img src="{{ Request::root().'/public/website/img/'.$websiteImage->image }}" height="200" width="300">
             <!-- Start Update Form -->
                {!! Form::open([
                        'url' => '/adminpanel/images/update',
                        'method' => 'POST',
                        'files' => 'true'
                        ]) !!}
                      <input type="hidden" value="{{ $websiteImage->id}}" name="imgId">
                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                  <label for="image">Image</label>
                      {!! Form::file("image", null, [
                      'class' => 'form-control input-lg'
                      ]) !!}
                      @if ($errors->has('image'))
                      <span class="help-block">
                          <strong style="color:red">{{ $errors->first('image') }}</strong>
                      </span>
                      @endif
              </div> <br />
              <button type="submit" class="btn btn-danger btn-lg" style="width:150px"><i class="fa fa-save"></i> Save</button>
              {!! Form::close() !!}
              <!-- End Update Form --> 

               

            </div> 
         </div>
      </div>
  </div>


@endsection


@section('footer')

@include('admin.layouts.message')

@endsection