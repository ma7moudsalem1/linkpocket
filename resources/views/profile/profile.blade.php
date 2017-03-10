@extends('layouts.app')
@section('title')
{{ $user->name }}
@endsection

@section('meta')
<meta name="keywords" content="{{  $user->name.','. $user->username.','. getSettings('short').' '.getSettings(). ',' . $user->gender == 0 ? 'male' : 'female' }}">
<meta name="description" content="{{ $user->bio != null ? $user->bio : 'My name is '.$user->name.' and this my profile at '. getSettings('short').' ' .getSettings().' website'}}">

<!-- Social media meta -->
<meta property="og:image" content="{{ getImage($user->id) }}" />
<meta property="og:title" content="{{ $user->name }}" />
<meta property="og:descriptio" content="{{ $user->bio != null ? $user->bio : 'My name is '.$user->name.' and this my profile at '. getSettings('short').' ' .getSettings().' website'}}" />

@endsection
@section('content')
<div class="mainbody container-fluid">
    <div class="row">
        @include('layouts.sidebar')    
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            @include('layouts.message')
            <div class="panel panel-default">
                        <div class="panel-body">
                            <span>
                                <div class="col-md-3 col-sm-3 col-xs-3"><img src="{{ getImage($user->id) }}" class="img-responsive" height="150" width="150" /></div>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                  <h1 class="panel-title pull-left" style="font-size:30px;">{{ $user->name }} <br /><small>@<a href="{{ url('/profile/'.$user->username) }}" title="{ $user->username }}">{{ $user->username }}</a></small></h1>
                                    <br><br><br><br>
                                    @if($user->bio != null)
                                      <p>{{ $user->bio }}</p>
                                    @endif
                                </div>
                                
                                
                            </span>
                            <br><br>
                            
                            
                            <br><br><hr>
                            <span class="pull-left">
                                <a href="#" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Pockets" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-folder" aria-hidden="true"></i> Pockets <span class="badge" id="contact-num">{{ getUserPocketsCount($user->id) }}</span></a>
                                <a href="#" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Shared Pockets" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-share" aria-hidden="true"></i> Shared <span class="badge" id="contact-num">{{ GetCountShared($user->id) }}</span></a>
                                @if(! Auth::guest())
                                    @if(Auth::user()->id == $user->id)
                                <a href="#" title="contacts" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-users" aria-hidden="true"></i> Contacts <span class="badge" >{{ GetCountFollower(Auth::user()->id) }}</span></a>
                                    @endif
                                @endif
                            </span>
                            <span class="pull-right">
                                @if(! Auth::guest())
                                    @if(Auth::user()->id != $user->id)
                                <a href="#" class="btn btn-link message" style="text-decoration:none;"><i class="fa fa-lg fa-envelope-o" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Message"></i></a>
                                    @endif
                                @endif

                                @if(! Auth::guest())
                                    @if(Auth::user()->id != $user->id)
                                <a href="#" class="btn btn-link follow" title="option" data-target="{{ $user->id }}">

                                    @if(checkFollow(Auth::user()->id, $user->id))
                                    <span class="stutes">Unfollow</span>
                                    @else
                                    <span class="stutes">Follow</span>
                                    @endif
                                </a>
                                    @endif
                                @endif
                            </span>
                        </div>
                    </div>
                    <hr>
                    <!-- Simple post content example. -->
                    @include('pocket.list')
                    
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
        <h4 class="modal-title">Send a message</h4>
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
    @if(! Auth::guest())
    <script type="text/javascript">
        var userId = 0;
        var state  = '{{ checkFollow($user->id, Auth::user()->id) }}';
        var followUrl = "{{ url('/profile/follow/'.$user->id) }}";
        var recieveMessage = "{{ $user->name }}" + ' will get your message';
        $('.follow').on('click', function(event) {
             
            userId = $('.follow').attr("data-target");
             event.preventDefault()
            var isFollow = event.previousElementSibling == null;
            $.ajax({
                method: 'get',
                url: followUrl,
                data: {follow: userId}
            })
            .done(function (){
               $('.stutes').text() == 'Follow' ? $('.stutes').text("Unfollow") : $('.stutes').text("Follow");
                
            });
        });
        var messageBody ;
        var messageUrl = "{{ url('/message/create') }}";
        var token = '{{ Session::token() }}';
        $("#send").on("click", function () {
            userId = $('.follow').attr("data-target");
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
              title: recieveMessage,
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
    @endif

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
