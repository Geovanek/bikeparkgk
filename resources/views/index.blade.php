@extends('layouts.app')

@section('page-css')

@endsection

@section('content')

<div class="wrapper wrapper-content">
    @livewire('home-local-legend')

    @include('faq')

    <div class='embed-container'>
        <iframe src='https://www.youtube.com/embed/xGIPwfhW6Mk' frameborder='0' allowfullscreen></iframe>
    </div>

</div>

@include('layouts.sidebarRight')

@endsection

@push('custom-scripts')
@endpush