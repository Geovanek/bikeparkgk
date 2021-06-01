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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('Dashio/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('Dashio/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('Dashio/lib/gritter/css/jquery.gritter.css') }}" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('Dashio/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('Dashio/css/style-responsive.css') }}" rel="stylesheet">

    {{-- page specific css --}}
    @yield('page-css')

    @livewireStyles

    <!-- =======================================================
        Template Name: Dashio
        Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
        Author: TemplateMag.com
        License: https://templatemag.com/license/
    ======================================================= -->
</head>
<body>
    <section id="container">
        @include('layouts.header')
        @include('layouts.sidebar')

        <section id="main-content">
            @yield('content')
        </section>

        @include('layouts.footer')
    </section>

  {{-- js placed at the end of the document so the pages load faster --}}
  <script src="{{ asset('Dashio/lib/jquery/jquery.min.js') }}"></script>

  <script src="{{ asset('Dashio/lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <script class="include" type="text/javascript" src="{{ asset('Dashio/lib/jquery.dcjqaccordion.2.7.js') }}"></script>
  <script src="{{ asset('Dashio/lib/jquery.scrollTo.min.js') }}"></script>
  <script src="{{ asset('Dashio/lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
  <script src="{{ asset('Dashio/lib/jquery.sparkline.js') }}"></script>

  {{-- common script for all pages --}}
  <script src="{{ asset('Dashio/lib/common-scripts.js') }}"></script>
  <script type="text/javascript" src="{{ asset('Dashio/lib/gritter/js/jquery.gritter.js') }}"></script>
  <script type="text/javascript" src="{{ asset('Dashio/lib/gritter-conf.js') }}"></script>

  {{-- script for this page --}}
  @stack('custom-scripts')

  <script src="{{ asset('js/enable-push.js') }}" defer></script>
  
  {{-- livewire js --}}
  @livewireScripts
  @yield('livewire-js')
</body>
</html>
