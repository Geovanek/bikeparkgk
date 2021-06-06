@extends('layouts.app')

@section('page-css')

@endsection

@section('content')

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">

        </div>
    </div>

    @include('faq')

</div>

@include('layouts.sidebarRight')

@endsection

@push('custom-scripts')
@endpush