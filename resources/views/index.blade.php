@extends('layouts.app')

@section('page-css')

@endsection

@section('content')

<div class="wrapper wrapper-content">
    @livewire('home-local-legend')

    @include('faq')

</div>

@include('layouts.sidebarRight')

@endsection

@push('custom-scripts')
@endpush