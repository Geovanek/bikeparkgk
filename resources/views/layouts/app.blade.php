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
    <link href="{{ asset('Inspina/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('Inspina/css/plugins/codemirror/codemirror.css') }}" rel="stylesheet">
    <link href="{{ asset('Inspina/css/plugins/codemirror/ambiance.css') }}" rel="stylesheet">
    <link href="{{ asset('Inspina/css/style.css') }}" rel="stylesheet">

    <style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style>

    {{-- page specific css --}}
    @yield('page-css')

    @livewireStyles
    
</head>
<body class="top-navigation">
    <div id="wrapper">
        <div id="page-wrapper" style="background: #111">
            @include('layouts.header')
            @yield('content')
        </div>
    </div>
{{-- <body class="fixed-sidebar no-skin-config">
    
    <div style="overflow-y: hidden;" id="wrapper">
        @include('layouts.sidebarLeft')
        <div id="page-wrapper" class="gray-bg @if(Request::is('/')) sidebar-content @endif">
            @include('layouts.header')
            
                @include('includes._alerts')

                @yield('content')

            @include('layouts.footer')
        </div>
    </div> --}}

  <!-- Mainly scripts -->
  <script src="{{ asset('Inspina/js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('Inspina/js/popper.min.js') }}"></script>
  <script src="{{ asset('Inspina/js/bootstrap.js') }}"></script>
  <script src="{{ asset('Inspina/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
  <script src="{{ asset('Inspina/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

  <!-- Peity -->
  <script src="{{ asset('Inspina/js/plugins/peity/jquery.peity.min.js') }}"></script>
  <script src="{{ asset('Inspina/js/demo/peity-demo.js') }}"></script>
  <!-- Custom and plugin javascript -->
  <script src="{{ asset('Inspina/js/inspinia.js') }}"></script>
  <script src="{{ asset('Inspina/js/plugins/pace/pace.min.js') }}"></script>
  <!-- jQuery UI -->
  <script src="{{ asset('Inspina/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('Inspina/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
  <!-- ChartJS-->
  <script src="{{ asset('Inspina/js/plugins/chartJs/Chart.min.js') }}"></script>

  {{-- script for this page --}}
  @stack('custom-scripts')

  <script src="{{ asset('js/enable-push.js') }}" defer></script>
  
  {{-- livewire js --}}
  @livewireScripts
  @yield('livewire-js')
</body>
</html>
