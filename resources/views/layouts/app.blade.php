<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ Request::root().'/public/website/img/'.getImgesByName('icon') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ getSettings() }} | @yield('title')
    </title>
        @yield('meta')
        
        <meta property="og:type" content="website">
        <meta property="og:og:site_name" content="{{ Request::root() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <!-- Styles -->
    {!! Html::style('public/website/css/bootstrap.css') !!}
    {!! Html::style('public/website/css/font-awesome.min.css') !!}
    {!! Html::style('public/website/css/style.css') !!}
    {!! Html::style('public/website/css/style2.css') !!}
    {!! Html::style('public/website/css/hover.css') !!}
    <!-- Sweetalert -->
    {!! Html::style('public/cus/sweetalert.css') !!}
    <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700'>
     <!--[if lt IE 9]>
      {!! Html::script('public/website/js/html5shiv.min.js') !!}
      {!! Html::script('public/website/js/respond.min.js') !!}
    <![endif]-->
    @yield('header')
</head>
<body>
    @include('layouts.menu')
    
    @yield('content')
    
    @include('layouts.footer')
    <!-- Scripts -->
    {!! Html::script('public/website/js/jquery-1.12.3.js') !!}
    {!! Html::script('public/website/js/bootstrap.min.js') !!}
    {!! Html::script('public/website/js/plugins.js') !!}
    {!! Html::script('public/website/js/app.js') !!}
    <!-- Sweetalert -->
    {!! Html::script('public/cus/sweetalert.min.js') !!}
    <script type="text/javascript">
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>
    @yield('footer')
</body>
</html>
