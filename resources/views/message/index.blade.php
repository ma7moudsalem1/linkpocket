@extends('layouts.app')

@section('title')
Inbox
@endsection

@section('meta')
<meta name="keywords" content="{{ getSettings('keywords') }}">
<meta name="description" content="{{ getSettings('descrip') }}">

<!-- Social media meta -->
<!--<meta property="og:image" content="'Social Share')) }}" />-->
<meta property="og:title" content="{{ getSettings('short').' '.getSettings() }}" />
<meta property="og:descriptio" content="{{ getSettings('descrip') }}" />
@endsection

@section('content')
<div class="mainbody container-fluid">
    <div class="row">
        @include('layouts.sidebar')    
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            @include('layouts.message')
            
            <div class="tab-content">
			  <div class="tab-pane active" id="inbox">
			  		<div class="panel panel-default">
			           <div class="content-container clearfix">
			               <div class="col-md-12">
			                   <div class="panel-heading text-center"><h4>Inbox</h4></div>
			                   		<div class="panel-body">
					                   <ul class="mail-list">
					                  
					                    @forelse($messages as $message)
					                       <li id="inbox" data-target="{{ $message->user_id }}">
					                           		<a href="#" id="message" class="btn btn-link message pull-right" style="text-decoration:none;"><i class="fa fa-lg fa-envelope-o" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Reply"></i></a>
					                               <span class="mail-sender"><i class="fa fa-comments-o" aria-hidden="true"></i> <a href="{{ url('/profile/'.getUserData($message->user_id, 'username')) }}" >{{ getUserData($message->user_id, 'name') }}</a></span>
					                               <span class="mail-subject"><small><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $message->created_at->diffForHumans() }}</small></span>
					                               <span class="mail-message-preview"><i class="fa fa-envelope" aria-hidden="true"></i> {{ $message->message }}</span>
					                          		
					                       </li>
					                       @empty
					                       	<li><div class="alert alert-danger">Oops look like there is no messages</div></li>
					                      @endforelse
					                   </ul>
				                   </div>
			               		</div>
			               		<div class="col-12-md text-center">{{ $messages->links() }}</div>
			           		</div>
			       	 	</div>
			 		 </div>
				</div>          
            </div>
        </div>
    </div>
@endsection

<div class="modal fade" tabindex="-1" role="dialog" id="message-model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Reply</h4>
      </div>
      <div class="modal-body">
        {!! Form::open([
                          'method'  => 'POST',
                          'url'     => '/message/create',
                          ]) 
            !!}
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="form-control counted" cols="30" rows="5"></textarea>
                @if ($errors->has('message'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('message') }}</strong>
                            </span>
                @endif
                <h6 class="" id="counter">320 characters remaining</h6>
            </div>
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="send" class="btn btn-primary">Send</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@section('footer')
<script type="text/javascript">
	var userId = 0;
	$("#inbox").find("#message").on('click', function(event){
		 userId = event.target.parentNode.parentNode.dataset['target'];
	});
	$("#send").on("click", function () {
            messageBody = $('#message').val();
            if(messageBody == ''){
                $("#message-model").modal('hide');
               swal({
              title: 'message can not be empty',
              text: "This message will close in 2 seconds.",
              timer: 2000,
              showConfirmButton: false
            });
            }else{
            $.ajax({
                type: "get",
                url: "{{ url('/message/create') }}",
                data: {'reciever': userId, 'messageBody': messageBody,  '_token': $('input[name=_token]').val()}

            })
            .done(function (){
                $('#message').val('');
                $("#message-model").modal('hide');
               swal({
              title: 'Done',
              text: "This message will close in 2 seconds.",
              timer: 2000,
              showConfirmButton: false
            });
                
            })

            .fail(function() {
                 $("#message-model").modal('hide');
               swal({
              title: 'Oops there is something wrong',
              text: "This message will close in 2 seconds.",
              timer: 2000,
              showConfirmButton: false
            });
            });

        }
        });
</script>
@endsection