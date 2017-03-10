
@extends('admin.layouts.master')

@section('title')
  Pockets
@endsection

@section('header')

<style type="text/css">
	.carousel-caption{
		background-color: rgba(3,3,3,0.3);
		padding: 5%;
		bottom: 15%;
	}
  .carousel-inner > .item > img {
    width: 100%;
    max-height: 450px;
}

</style>

@endsection
@section('content-header')
      <h1>
        Sliders Mangement - View
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sliders</li>
      </ol>
@endsection

@section('content')
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sliders</h3>
              <a href="{{ url('/adminpanel/sliders/create') }}" class="btn btn-success pull-right" style="margin-left:5px"><i class="fa fa-plus-square" aria-hidden="true"></i></a>        
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                @foreach($sliders as $key => $slider)
                  <li data-target="#carousel-example-generic" data-slide-to="{{ $key }}" class="{{ $key ==  0 ?  'active' : ''}}"></li>
                @endforeach
                </ol>
                <div class="carousel-inner">
                @foreach($sliders as $key => $slider)
                  <div class="item {{ $key ==  0 ?  'active' : ''}}">
                    <img src="{{ Request::root().'/public/website/img/slider/'.$slider->img }}" alt="slide {{ $key }}">

                    <div class="carousel-caption">
                     	{!! $slider->body !!}
                      <a href="{{ url('/adminpanel/sliders/'.$slider->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Slider</a>
                      <a href="{{ url('/adminpanel/sliders/'.$slider->id.'/delete') }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete Slider</a>
                      <br /><br /><br />
                    </div>
                  </div>
                @endforeach
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
              <br /><br /><br />
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
@endsection
@section('footer')
@include('admin.layouts.message')

@endsection
