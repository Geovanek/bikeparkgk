@extends('layouts.app')

@section('title', " - Admin")

@section('page-css')

@endsection

@section('content')
    @livewire('admin')
@endsection

@push('custom-scripts')

@endpush

@section('livewire-js')
    <script src="{{asset('js/livewireGritter.js')}}"></script>
@endsection