@extends('layouts.app')

@section('page-css')

@endsection

@section('content')

    @livewire('rachao')
    
    <div class="wrapper wrapper-content">
        {{-- @livewire('home-local-legend') --}}
        <div class="row justify-content-center">
            @livewire('rachao-inscritos')
        </div>

        {{-- @include('faq') --}}

        {{-- <div class='embed-container'>
            <iframe src='https://www.youtube.com/embed/xGIPwfhW6Mk' frameborder='0' allowfullscreen></iframe>
        </div> --}}

    </div>

    {{-- @include('layouts.sidebarRight') --}}

@endsection

@push('custom-scripts')
    <script>
        $(function(){
        // Executa o evento click no button
        $('#copyPIX').click(function(){
            // Seleciona o conteúdo do input
            $('#pix').select();
            // Copia o conteudo selecionado
            var copiar = document.execCommand('copy');
            // Verifica se foi copia e retona mensagem
            if(copiar){
                alert('Chave PIX copiada');
            }else {
                alert('Erro ao copiar, seu navegador pode não ter suporte a essa função.');
            }
        });
    });
    </script>
@endpush