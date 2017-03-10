@extends('admin.layouts.master')

@section('title')
 Pocket Links
@endsection

@section('header')
<!-- DataTables -->
{!! Html::style('public/admin/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection
@section('content-header')
      <h1>
        Links Mangement - Pocket
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/adminpanel/links') }}"><i class="fa fa-link"></i> Link</a></li>
        <li class="active">links Pocket</li>
      </ol>
@endsection

@section('content')
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">All trash</h3>
              <a href="{{ url('/adminpanel/links/create') }}" class="btn btn-success pull-right" style="margin-left:5px"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Created at</th>
                  <th>Creator</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($links as $link)
                 <tr>
                  <th>{{ $link->title }}</th>
                  <th>{{ $link->created_at->diffForHumans() }}</th>
                  <th>{{ $link->pocket->user->name }}</th>
                  <th>
                      <a href="{{ url('/adminpanel/links/' . $link->id . '/edit') }}" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>
                      <a href="{{ url('/adminpanel/links/' . $link->id . '/trash') }}" class="btn btn-warning btn-circle confirmation"><i class="fa fa-trash-o"></i></a>
                      <a href="{{ url('/adminpanel/links/' . $link->id . '/delete') }}" class="btn btn-danger btn-circle confirmation"><i class="fa fa-times"></i></a>
                     
                  </th>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Title</th>
                  <th>Created at</th>
                  <th>Creator</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
@endsection

@section('footer')
@include('admin.layouts.message')

{!! Html::script('public/admin/plugins/datatables/jquery.dataTables.min.js') !!}
{!! Html::script('public/admin/plugins/datatables/dataTables.bootstrap.min.js') !!}

<script type="text/javascript">
$(function () {
   $('#data').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  }); 

</script>

@endsection
