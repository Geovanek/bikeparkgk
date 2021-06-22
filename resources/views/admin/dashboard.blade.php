@extends('admin.layouts.app')

@section('page-css')
    <link href="{{ asset('Inspina/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet">
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
    <!-- TouchSpin -->
    <script src="{{ asset('Inspina/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.footable').footable();
        });
        $(".touchspin").TouchSpin({
            buttondown_class: 'btn btn-link',
            buttonup_class: 'btn btn-link'
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