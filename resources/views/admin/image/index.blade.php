@extends('admin.layouts.master')

@section('title')
  Site Images
@endsection

@section('header')
<!-- DataTables -->
{!! Html::style('public/admin/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection
@section('content-header')
      <h1>
        Images Mangement - View
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/adminpanel/settings') }}"><i class="fa fa-cogs"></i> Site Settings</a></li>
        <li class="active">View Images</li>
      </ol>
@endsection

@section('content')
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Images</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($websiteImages as $image)
                    <tr>
                        <td><a href="{{ url('/adminpanel/images/'.$image->id.'/edit') }}">{{ $image->name }}</a></td>
                        <td><a href="{{ url('/adminpanel/images/'.$image->id.'/edit') }}"><img src="{{ Request::root().'/public/website/img/'.$image->image }}" height="50" width="50"></a></td>
                        <td><a href="{{ url('/adminpanel/images/'.$image->id.'/edit') }}" class="btn btn-info"><i class="fa fa-edit"></i></a></td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Image</th>
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