@extends('admin.layouts.master')

@section('title')
  { $message->name }} message
@endsection

@section('content-header')
  	  <h1>pages Mangement - Edit</h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/adminpanel/contacts') }}"><i class="fa fa-envelope"></i> Inbox</a></li>
        <li class="active">{{ $message->name }} message</li>
      </ol>
@endsection

@section('content')
  <div class="box">
        <div class="box-header">
            <h3 class="box-title">Message from {{ $message->name }}</h3>
        <!-- /.box-header -->
        <div class="box-body">
        	<div class="container">
    			<div class="row">
            <div class="col-md-8">
              <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Read Mail</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="mailbox-read-info">
                        <h3>From: {{ $message->name }}</h3>
                        <h5>Subject: {{ $type[$message->type] }}</h5>
                        <h6>{{ $message->created_at->diffForHumans() }}</h6>
                    </div>
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">
                       {{ $message->message }}                 
                    </div>
                    <!-- /.mailbox-read-message -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
                <!-- /.box-footer -->
                <div class="box-footer">
                    <form method="post">
                    <button type="button" class="btn btn-default" data-target="#delete_mail" data-toggle="modal"><i class="fa fa-trash-o"></i> Delete</button>
                    <button type="button" class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                    <div class="modal fade" id="delete_mail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Delete mail</h4>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this message ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                            <a href="{{ url('/adminpanel/contacts/'.$message->id.'/delete') }}" value="delete_mail" class="btn btn-danger">Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /. box -->
        </div>

        		</div> 
         </div>
    	</div>
  </div>


@endsection


@section('footer')

@include('admin.layouts.message')
@endsection