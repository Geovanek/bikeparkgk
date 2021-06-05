@extends('layouts.app')

@section('title', " - Perfil")

@section('page-css')

@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Perfil</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Perfil</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        @livewire('profile')
        @livewire('activity-stream')
    </div>
@endsection

@push('custom-scripts')
    <script>
        $(document).ready(function() {


            $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 48], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#1ab394',
                fillColor: "transparent"
            });


        });
    </script>
@endpush

@section('livewire-js')
    <script type="text/javascript">
        window.livewire.on('closeModal', () => {
            $('#myModal').modal('hide');
        });
    </script>
@endsection
