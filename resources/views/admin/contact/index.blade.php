@extends('admin.layouts.master')

@section('title')
Contact Us
@endsection

@section('header')
<!-- DataTables -->
{!! Html::style('public/admin/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection
@section('content-header')
      <h1>
        Pockets Mangement - View
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Contact Us</li>
      </ol>
@endsection

@section('content')
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">All message</h3>
              <a href="{{ url('/adminpanel/pockets/create') }}" class="btn btn-success pull-right" style="margin-left:5px"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
              <a href="{{ url('/adminpanel/pockets/trash') }}" class="btn btn-danger pull-right" ><i class="fa fa-trash-o"></i> Trash</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>View</th>
                  <th>Subject</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>View</th>
                  <th>Subject</th>
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


        var lastIdx = null;

        $('#data thead th').each( function () {
            if($(this).index()  < 2){
                var classname = $(this).index() == 6  ?  'date' : 'dateslash';
                var title = $(this).html();
                $(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" search by '+title+'" />' );
            }else if($(this).index() == 2){
                $(this).html( '<select><option value=""> All </option><option value="0"> New Message </option><option value="1"> Old Message </option></select>' );
            }
            else if($(this).index() == 3){
                $(this).html( '<select>'+
                    '<option value=""> All </option>' +
                    @foreach(getTypeMessage() as $key => $value)
                    '<option value="{{ $key }}">{{ $value }}</option>' +
                    @endforeach
                    '</select>' );
            }

        } );

        var table = $('#data').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('/adminpanel/contacts/data') }}',
            columns: [
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'view', name: 'view'},
                {data: 'type', name: 'type'},
                {data: 'action', name: ''}
            ],
            "language": {
                "url": "{{ Request::root()  }}/public/admin/cus/Arabic.json"
            },
            "stateSave": false,
            "responsive": true,
            "order": [[0, 'desc']],
            "pagingType": "full_numbers",
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ],
            iDisplayLength: 25,
            fixedHeader: true,

            "oTableTools": {
                "aButtons": [


                    {
                        "sExtends": "csv",
                        "sButtonText": "Excel file",
                        "sCharSet": "utf16le"
                    },
                    {
                        "sExtends": "copy",
                        "sButtonText": "Copy",
                    },
                    {
                        "sExtends": "print",
                        "sButtonText": "Print",
                        "mColumns": "visible",


                    }
                ],

                "sSwfPath": "{{ Request::root()  }}/public/admin/cus/copy_csv_xls_pdf.swf"
            },

            "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
            ,initComplete: function ()
            {
                var r = $('#data tfoot tr');
                r.find('th').each(function(){
                    $(this).css('padding', 8);
                });
                $('#data thead').append(r);
                $('#search_0').css('text-align', 'center');
            }

        });

        table.columns().eq(0).each(function(colIdx) {
            $('input', table.column(colIdx).header()).on('keyup change', function() {
                table
                        .column(colIdx)
                        .search(this.value)
                        .draw();
            });




        });



        table.columns().eq(0).each(function(colIdx) {
            $('select', table.column(colIdx).header()).on('change', function() {
                table
                        .column(colIdx)
                        .search(this.value)
                        .draw();
            });

            $('select', table.column(colIdx).header()).on('click', function(e) {
                e.stopPropagation();
            });
        });


        $('#data tbody')
                .on( 'mouseover', 'td', function () {
                    var colIdx = table.cell(this).index().column;

                    if ( colIdx !== lastIdx ) {
                        $( table.cells().nodes() ).removeClass( 'highlight' );
                        $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
                    }
                } )
                .on( 'mouseleave', function () {
                    $( table.cells().nodes() ).removeClass( 'highlight' );
                } );




    </script>
@endsection
