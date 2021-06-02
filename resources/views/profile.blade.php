@extends('layouts.app')

@section('title', " - Perfil")

@section('page-css')

@endsection

@section('content')
    @livewire('profile')
@endsection

@push('custom-scripts')

@endpush

@section('livewire-js')
    <script type="text/javascript">
        window.livewire.on('closeModal', () => {
            $('#myModal').modal('hide');
        });
    </script>
@endsection
