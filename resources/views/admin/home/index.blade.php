@extends('admin.layouts.master')

@section('title')
	Dashboard
@endsection

@section('content-header')
	     <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
@endsection

@section('content')
	<!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-weixin"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Members Messages</span>
              <span class="info-box-number">{{ number_format($messageTotal) }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-link"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Links</span>
              <span class="info-box-number">{{ number_format($linkTotal) }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-share" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Shared Pockets</span>
              <span class="info-box-number">{{ number_format($shareTotal) }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Members</span>
              <span class="info-box-number">{{ number_format($usersTotal) }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly Recap Report Of Created Pockets</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Created Pockets monthly until now</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Deleted Pockets</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Total Pocket deleted</span>
                    <span class="progress-number"><b>{{ $totleDeletepockets }}</b>/{{ $totalPockets }}</span>

                    <div class="progress sm">
                     @if($totalPockets != 0)
                      <div class="progress-bar progress-bar-aqua" style="width: {{ ($totleDeletepockets / $totalPockets) * 100 }}%"></div>
                    @endif
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Public pocket deleted</span>
                    <span class="progress-number"><b>{{ $totalDelPublicPoc }}</b>/{{ $totalPublicPoc }}</span>

                    <div class="progress sm">
                    @if($totalPublicPoc != 0)
                      <div class="progress-bar progress-bar-green" style="width: {{ ($totalDelPublicPoc / $totalPublicPoc) * 100 }}%"></div>
                    @endif
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Protected pocket deleted</span>
                    <span class="progress-number"><b>{{ $totalDelProtectedPoc }}</b>/{{ $totalProtectedPoc }}</span>

                    <div class="progress sm">
                    @if($totalProtectedPoc != 0)
                      <div class="progress-bar progress-bar-yellow" style="width: {{ ($totalDelProtectedPoc / $totalProtectedPoc ) * 100 }}%"></div>
                    @endif
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Private pocket deleted</span>
                    <span class="progress-number"><b>{{ $totalDelPrivatePoc }}</b>/{{ $totalPrivatePoc }}</span>

                    <div class="progress sm">
                    @if($totalProtectedPoc != 0)
                      <div class="progress-bar progress-bar-red" style="width: {{ ($totalDelPrivatePoc / $totalPrivatePoc) * 100 }}%"></div>
                    @endif
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
           
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">8 New Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                  @foreach($latestUsers as $user)
                    <li>
                      <img src="{{ getImage($user->id) }}" alt="User Image">
                      <a class="users-list-name" href="{{ url('/adminpanel/users/'.$user->id.'/edit') }}">{{ $user->name }}</a>
                      <span class="users-list-date">{{ $user->created_at->diffForHumans() }}</span>
                    </li>
                   @endforeach
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{ url('/adminpanel/users') }}" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
        </div>

        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Pockets created</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Created by</th>
                    <th>Type</th>
                    <th>Created at</th>
                  </tr>
                  </thead>
                  <tbody>
                  @forelse($latestPockets as $pocket)
                  <tr>
                    <td><a href="{{ url('/adminpanel/pockets/'.$pocket->id.'/edit') }}">{{ $pocket->name }}</a></td>
                    <td><a href="{{ url('/adminpanel/users/'.$pocket->user->id.'/edit') }}">{{ $pocket->user->name }}</a></td>
                    <td><span class="label label-{{ GetPocketTypeLabel($pocket->type) }}">{{ GetPocketType($pocket->type) }}</span></td>
                    <td>{{ $pocket->created_at->diffForHumans() }}</td>
                  </tr>
                   @empty
                    <tr>
                    <td>No data</td>
                    <td>No data</td>
                    <td>No data</td>
                    <td>No data</td>
                  </tr>
                  @endforelse
               
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                  <a href="{{ url('/adminpanel/pockets') }}" class="uppercase">View All Pockets</a>
            </div>
            <!-- /.box-footer -->
          </div>
        </div>

      </div>
      <div class="row">
        
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Messages</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">

              @forelse($latestContacts as $contact)
                <li class="item">
                  <div class="product-img">
                    <img src="{{ Request::root().'/public/male.png' }}" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="{{ url('/adminpanel/contacts/'.$contact->id.'/show') }}" class="product-title">{{ $contact->name }}
                      <span class="label label-{{$contact->view == 0 ? 'danger' : 'success'}} pull-right">{{$contact->view == 0 ? 'Unread' : 'Read'}}</span></a>
                        <span class="product-description">
                          {{ str_limit($contact->message, 20) }}
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                @empty
                <li class="item text-center">
                  No data found
                </li>
             @endforelse
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="{{ url('/adminpanel/contacts') }}" class="uppercase">View All Messages</a>
            </div>
            <!-- /.box-footer -->
          </div>
        </div>

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->

           <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Thanks Messages</span>
              <span class="info-box-number"><b>{{ $thanks }}</b>/{{ $ContactTotal }}</span>

              <div class="progress">
              @if($ContactTotal != 0)
                <div class="progress-bar" style="width: {{ ($thanks / $ContactTotal) * 100 }}%"></div>
              @endif
              </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-meh-o" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Problem Messages</span>
              <span class="info-box-number"><b>{{ $problems }}</b>/{{ $ContactTotal }}</span>

              <div class="progress">
              @if($ContactTotal != 0)
                <div class="progress-bar" style="width: {{ ($problems / $ContactTotal) * 100 }}%"></div>
              @endif
              </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
         
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-flag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Suggestion Messages</span>
              <span class="info-box-number"><b>{{ $suggestions }}</b>/{{ $ContactTotal }}</span>

              <div class="progress">
              @if($ContactTotal != 0)
                <div class="progress-bar" style="width: {{ ($suggestions / $ContactTotal) * 100 }}%"></div>
               @endif
              </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

            <div class="info-box bg-blue">
            <span class="info-box-icon"><i class="fa fa-question-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Question Messages</span>
              <span class="info-box-number"><b>{{ $questions }}</b>/{{ $ContactTotal }}</span>

              <div class="progress">
              @if($ContactTotal != 0)
                <div class="progress-bar" style="width: {{ ($questions / $ContactTotal) * 100 }}%"></div>
              @endif
              </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Other Messages</span>
              <span class="info-box-number"><b>{{ $others }}</b>/{{ $ContactTotal }}</span>

              <div class="progress">
              @if($ContactTotal != 0)
                <div class="progress-bar" style="width: {{ ($others / $ContactTotal) * 100 }}%"></div>
              @endif
              </div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <!-- /.box -->
        </div>
      </div>
      
@endsection

@section('footer')
{!! Html::script('public/admin/dist/js/pages/dashboard2.js') !!}
  <script type="text/javascript">

  // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
  // This will get the first returned node in the jQuery collection.
  var salesChart = new Chart(salesChartCanvas);

  var salesChartData = {
    labels: [

     @foreach($pocketsChart as $c)
          {{ $c->month }},
        @endforeach

    ],
    datasets: [
      {
        label: "Digital Goods",
        fillColor: "rgba(60,141,188,0.9)",
        strokeColor: "rgba(60,141,188,0.8)",
        pointColor: "#3b8bba",
        pointStrokeColor: "rgba(60,141,188,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(60,141,188,1)",
        data: [

        @foreach($pocketsChart as $c)
          {{ $c->counting }},
        @endforeach

        ]
      }
    ]
  };

  var salesChartOptions = {
    //Boolean - If we should show the scale at all
    showScale: true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines: false,
    //String - Colour of the grid lines
    scaleGridLineColor: "rgba(0,0,0,.05)",
    //Number - Width of the grid lines
    scaleGridLineWidth: 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,
    //Boolean - Whether the line is curved between points
    bezierCurve: true,
    //Number - Tension of the bezier curve between points
    bezierCurveTension: 0.3,
    //Boolean - Whether to show a dot for each point
    pointDot: false,
    //Number - Radius of each point dot in pixels
    pointDotRadius: 4,
    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth: 1,
    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius: 20,
    //Boolean - Whether to show a stroke for datasets
    datasetStroke: true,
    //Number - Pixel width of dataset stroke
    datasetStrokeWidth: 2,
    //Boolean - Whether to fill the dataset with a color
    datasetFill: true,
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
    //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: true,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true
  };

  //Create the line chart
  salesChart.Line(salesChartData, salesChartOptions);

  //---------------------------
  //- END MONTHLY SALES CHART -
  //---------------------------

  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  </script>
@endsection