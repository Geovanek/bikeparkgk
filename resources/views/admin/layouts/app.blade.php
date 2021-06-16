<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Trilha de mountain bike cross-country (XCO) construída voluntariamente no munícipio de São José/SC">
    <meta name="author" content="Geovane Krüger">
    <meta name="keyword" content="Bike Park, Trilha, XCO, Trail, Mountain Bike, Trilha Ecológica, Trail Building, Cycling">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bike Park GK') }} @yield('title')</title>

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">

    <link href="{{ asset('Inspina/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Inspina/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <!-- FooTable -->
    <link href="{{ asset('Inspina/css/plugins/footable/footable.core.css') }}" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="{{ asset('Inspina/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
    <!-- Toastr style -->
    <link href="{{ asset('Inspina/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <link href="{{ asset('Inspina/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('Inspina/css/style.css') }}" rel="stylesheet">

    @yield('page-css')

    @livewireStyles
    
</head>
<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            @include('admin.layouts.header')
            @yield('content')
        </div>
    </div>

  <!-- Mainly scripts -->
  <script src="{{ asset('Inspina/js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('Inspina/js/popper.min.js') }}"></script>
  <script src="{{ asset('Inspina/js/bootstrap.js') }}"></script>
  <script src="{{ asset('Inspina/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
  <script src="{{ asset('Inspina/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

  <!-- Flot -->
  <script src="{{ asset('Inspina/js/plugins/flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('Inspina/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
  <script src="{{ asset('Inspina/js/plugins/flot/jquery.flot.spline.js') }}"></script>
  <script src="{{ asset('Inspina/js/plugins/flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('Inspina/js/plugins/flot/jquery.flot.pie.js') }}"></script>
  <script src="{{ asset('Inspina/js/plugins/flot/jquery.flot.symbol.js') }}"></script>
  <script src="{{ asset('Inspina/js/plugins/flot/curvedLines.js') }}"></script>

  <!-- FooTable -->
  <script src="{{ asset('Inspina/js/plugins/footable/footable.all.min.js') }}"></script>
  <!-- Custom and plugin javascript -->
  <script src="{{ asset('Inspina/js/inspinia.js') }}"></script>
  <script src="{{ asset('Inspina/js/plugins/pace/pace.min.js') }}"></script>
  <!-- jQuery UI -->
  <script src="{{ asset('Inspina/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('Inspina/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
  <!-- Sparkline demo data  -->
  <script src="{{ asset('Inspina/js/demo/sparkline-demo.js') }}"></script>
  <!-- ChartJS-->
  <script src="{{ asset('Inspina/js/plugins/chartJs/Chart.min.js') }}"></script>
  <!-- Sweet alert -->
  <script src="{{ asset('Inspina/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
  <!-- Toastr -->
  <script src="{{ asset('Inspina/js/plugins/toastr/toastr.min.js') }}"></script>

  {{-- script for this page --}}
  @stack('custom-scripts')

  <script src="{{ asset('js/enable-push.js') }}" defer></script>
  
  {{-- livewire js --}}
  @livewireScripts
  @yield('livewire-js')
</body>
</html>
