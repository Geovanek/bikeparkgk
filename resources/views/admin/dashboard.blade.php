@extends('admin.layouts.app')

@section('page-css')
@endsection

@section('content')

<div class="wrapper wrapper-content">
    <div class="container">
        @livewire('admin.config-segment')
        @livewire('admin.athletes-table')
        @livewire('admin.activities-table')
    </div>
</div>

@endsection

@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('.footable').footable();

        });
    </script>
@endpush

@section('livewire-js')
    <script src="{{asset('js/livewireToastr.js')}}"></script>
    <script src="{{asset('js/livewireSweetAlert.js')}}"></script>
    <script type="text/javascript">
        window.livewire.on('closeModal', () => {
            $('#modalConfigSegment').modal('hide');
        });
    </script>
    <script type="text/javascript">
        window.livewire.on('footable', () => {
            $('.footable').footable();
        });
    </script>
@endsection