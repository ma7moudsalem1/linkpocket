<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ getSettings() }} Admin | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  {!! Html::style('public/admin/bootstrap/css/bootstrap.min.css') !!}
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  {!! Html::style('public/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}
  <!-- Theme style -->
  {!! Html::style('public/admin/dist/css/AdminLTE.min.css') !!}
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  {!! Html::style('public/admin/dist/css/skins/_all-skins.min.css') !!}

  
  <!-- Sweetalert -->
  {!! Html::style('public/cus/sweetalert.css') !!}
  @yield('header')
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('admin.layouts.menu')
    @include('admin.layouts.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        @yield('content-header')
      </section>
      <!-- Main content -->
      <section class="content">
        @yield('content')
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.6
      </div>
      <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
    </footer>
  </div>
<!-- jQuery 2.2.3 -->
{!! Html::script('public/admin/plugins/jQuery/jquery-2.2.3.min.js') !!}
<!-- Bootstrap 3.3.6 -->
{!! Html::script('public/admin/bootstrap/js/bootstrap.min.js') !!}
<!-- FastClick -->
{!! Html::script('public/admin/plugins/fastclick/fastclick.js') !!}
<!-- AdminLTE App -->
{!! Html::script('public/admin/dist/js/app.min.js') !!}
<!-- Sparkline -->
{!! Html::script('public/admin/plugins/sparkline/jquery.sparkline.min.js') !!}
<!-- jvectormap -->
{!! Html::script('public/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
{!! Html::script('public/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
<!-- SlimScroll 1.3.0 -->
{!! Html::script('public/admin/plugins/slimScroll/jquery.slimscroll.min.js') !!}
<!-- ChartJS 1.0.1 -->
{!! Html::script('public/admin/plugins/chartjs/Chart.min.js') !!}
<!-- AdminLTE for demo purposes -->
{!! Html::script('public/admin/dist/js/demo.js') !!}
{!! Html::script('public/admin/dist/js/custom.js') !!}

<!-- Sweetalert -->
{!! Html::script('public/cus/sweetalert.min.js') !!}



@yield('footer')
</body>
</html>
