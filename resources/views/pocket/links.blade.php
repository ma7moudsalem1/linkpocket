@extends('layouts.app')
@section('title')
{{ $pocket->name }}
@endsection

@section('meta')
<meta name="keywords" content="{{ $pocket->name.','.$pocket->user->name.','.$pocket->user->username.','.getSettings('short').','.getSettings().','.
getSettings('short').' '.getSettings() }} {{ $pocket->type == 0 ? getSettings('public') : getSettings('protected')
 }}">
<meta name="description" content="{{ $pocket->descrip != null ? $pocket->descrip : 'Protected pocket created by'.$pocket->user->name }}">

<!-- Social media meta -->
<meta property="og:image" content="{{ GetPocketImage($pocket->type) }}" />
<meta property="og:title" content="{{ $pocket->name }}" />
<meta property="og:descriptio" content="{{ $pocket->descrip != null ? $pocket->descrip : 'Protected pocket created by'.$pocket->user->name }}" />
@endsection

@section('content')
<div class="mainbody container-fluid">
    <div class="row">
        @include('layouts.sidebar')    
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            @include('layouts.message')
            <div class="panel panel-default">
                <div class="panel-body">
                     <h6 class="panel-title pull-left" style="font-size:18px;">
                     <i class="fa fa-folder" aria-hidden="true"></i> {{ $pocket->name.' created by '.$pocket->user->name }}</h6>
                     @if(! Auth::guest())
                      @if($pocket->user_id == Auth::user()->id)
                     <a href="{{ url('/pockets/create') }}" class="pull-right btn btn-success" style="margin-left:5px"><i class="fa fa-plus" aria-hidden="true"></i></a>
                     <a href="#" id="delete"class="pull-right btn btn-danger delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                      @endif
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    
                   @include('link.links')
                  
                </div>
            </div>         
        </div>
    </div>
</div>
@endsection

@if(! Auth::guest())
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
        <a id="remove" class="btn btn-danger" href="{{ url('/pockets/'.$pocket->id.'/delete') }}">Yes</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="add-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Take this pocket</h4>
      </div>
      <div class="modal-body">
       @include('pocket.form')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <a id="save" class="btn btn-primary" href="#">Save</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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

var pocketId = 0;
$("#share").on('click', function(){
  pocketId = $(this).attr("data-target");
  token = "{{ Session::token() }}";
  $.ajax({
      method: 'post',
      url: "{{ url('/pockets/share/create') }}",
      data: {'id': pocketId, '_token': token }
   })
  .done(function (){
         swal({
              title: 'Pocket shared successfully',
              text: "This message will close in 2 seconds.",
              timer: 2000,
              showConfirmButton: false
            });
                
    })
  .fail(function() {
               swal({
              title: 'Oops there is something wrong',
              text: "This message will close in 2 seconds.",
              timer: 2000,
              showConfirmButton: false
            });
            });
});


$("#save").on('click', function(){
var pocketName = $("#name").val();
var pocketType = $("#dbType").val();
var pocketPass = $("#password").val();
var pocketDesc = $("#descrip").val();
token = "{{ Session::token() }}";
pocketId = $("#addmark").attr("data-target");
console.log(pocketId);
  $.ajax({
      method: 'post',
      url: "{{ url('/pockets/take') }}",
      data: {'name': pocketName, 'type': pocketType,  'password': pocketPass, 'descrip': pocketDesc, 'pocketId': pocketId, '_token': token }
   })
  .done(function (){
    $("#add-modal").modal('hide');
         swal({
              title: 'Pocket created successfully',
              text: "This message will close in 2 seconds.",
              timer: 2000,
              showConfirmButton: false
            });
                
    })
  .fail(function() {
               swal({
              title: 'Oops there is something wrong',
              text: "This message will close in 2 seconds.",
              timer: 2000,
              showConfirmButton: false
            });
            });
});


</script>


@endsection
@endif