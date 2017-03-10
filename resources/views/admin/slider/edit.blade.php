@extends('admin.layouts.master')

@section('title')
  Edit Slider
@endsection

@section('content-header')
  	  <h1>Sliders Mangement - Edit</h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/adminpanel/sliders') }}"><i class="fa fa-slider"></i> slider</a></li>
        <li class="active">Edit Slider</li>
      </ol>
@endsection

@section('content')
  <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit Slider</h3>
            <a href="{{ url('/adminpanel/sliders/create') }}" class="btn btn-success pull-right" style="margin-left:5px"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
            <a href="#" id="Delete" class="btn btn-danger pull-right" ><i class="fa fa-trash" aria-hidden="true"></i></a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        	<div class="container">
    			<div class="row">
    				 <!-- Start Update Form -->
                {!! 
                Form::model($slider, [
                'route' => ['sliders.update', $slider->id], 
                'method' => 'PATCH',
                'files' => 'true'
                ]) 
                !!}
        				@include('admin.slider.form')
              {!! Form::close() !!}
              <!-- End Update Form --> 

               

        		</div> 
         </div>
    	</div>
  </div>


@endsection
<div class="modal fade" tabindex="-1" role="dialog" id="deleteAlert">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmation message</h4>
      </div>
      <div class="modal-body">
       Are you sure you want to delete this ??
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <a href="{{ url('/adminpanel/sliders/'.$slider->id.'/delete') }}" id="remove" class="btn btn-danger">Yes</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


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

$("#Delete").on('click', function (){
  $("#deleteAlert").modal();
});
</script>
@endsection