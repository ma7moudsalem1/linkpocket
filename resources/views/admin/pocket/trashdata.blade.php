@extends('admin.layouts.master')

@section('title')
 Pockets Trash
@endsection

@section('header')
<!-- DataTables -->
{!! Html::style('public/admin/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection
@section('content-header')
      <h1>
        Pockets Mangement - Trash
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/adminpanel/pockets') }}"><i class="fa fa-folder"></i> Pockets</a></li>
        <li class="active">Pockets trash</li>
      </ol>
@endsection

@section('content')
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">All trash</h3>
              <a href="{{ url('/adminpanel/pockets/create') }}" class="btn btn-success pull-right" style="margin-left:5px"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
              <a href="{{ url('/adminpanel/pockets/delete/trash/all') }}" class="btn btn-danger pull-right confirmation" ><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Creator</th>
                  <th>Deleted time</th>
                  <th>Type</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($allTrash as $trash)
                 <tr>
                  <th>{{ $trash->name }}</th>
                  <th>{{ $trash->user->name }}</th>
                  <th>{{ $trash->deleted_at->diffForHumans() }}</th>
                  <th>{{ GetPocketType($trash->type) }}</th>
                  <th>
                      <a href="{{ url('/adminpanel/pockets/' . $trash->id . '/delete/trash') }}" class="btn btn-danger btn-circle confirmation"><i class="fa fa-times"></i></a>
                      <a href="{{ url('/adminpanel/pockets/' . $trash->id . '/restore') }}" class="btn btn-primary btn-circle"><i class="fa fa-external-link"></i></a>
                  </th>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Creator</th>
                  <th>Deleted time</th>
                  <th>Type</th>
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
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  }); 

</script>

@endsection
