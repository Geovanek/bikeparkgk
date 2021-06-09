@extends('layouts.app')

@section('title', " - Ranking")

@section('page-css')

@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @livewire('ranking')
    </div>
@endsection