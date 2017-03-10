@extends('layouts.app')
@section('title')
My Pockets
@endsection

@section('meta')
<meta name="keywords" content="{{ getSettings('keywords') }}">
<meta name="description" content="{{ getSettings('descrip') }}">

<!-- Social media meta -->
<meta property="og:image" content="{{ Request::root().'/public/website/img/'.getImgesByName('social') }}" />
<meta property="og:title" content="{{ getSettings('short').' '.getSettings() }}" />
<meta property="og:descriptio" content="{{ getSettings('descrip') }}" />
@endsection

@section('content')
<div class="mainbody container-fluid">
    <div class="row">
        @include('layouts.sidebar')    
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            @include('layouts.message')
            <div class="panel panel-default">
                <div class="panel-body">
                     <small class="panel-title pull-left" style="font-size:30px;">
                     <i class="fa fa-folder" aria-hidden="true"></i> MY Pocket</small>
                </div>
            </div>
            @include('pocket.list')
            <br /><br />  
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
        <button type="button" id="remove" class="btn btn-danger">Yes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@section('footer')
 <script type="text/javascript">


     var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure You Want to delete this?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
 </script>

 <script type="text/javascript">
       var Id = 0;
      $(".delete").on('click', function() {
     Id = $(this).attr('data-id');
     });
      $("#remove").on("click", function () {
        $.ajax({
          type: "get",
          url: "{{ url('pockets/delete') }}" + "/" +Id,
          data: {}

            })
        .done(function (){
              $("#deleteAlert").modal('hide');
              $("#allbox"+Id).remove(); 
              $("#contact-num").text($("#contact-num").text()-1);
              
            })

        .fail(function() {
              $("#deleteAlert").modal('hide');
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
