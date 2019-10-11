@extends('layout.default')

@section('titulo', 'Principal | SGR')

@section('conteudo')

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-head">
            <div class="page-title">
                <h1>Início</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <span class="caption-subject bold uppercase">Sistema Inspeção de Chamados</span>
                        </div>

                    </div>
                    <div class="portlet-body">
                        <!-- @php
                        $nome_completo = explode(' ', Auth::user()->name);
                        $nome = $nome_completo[0];
                        @endphp                         -->
                        <i class="fa fa-thumbs-o-up fa-2x"></i> Bem Vindo, {{ $nome }}!<br>
                        {{-- <br>Para começar, escolha uma das opções ao lado. --}}

                    </div>

                </div>
            </div>
        </div>
        
        @include('view.home.painel')

    </div>

</div>

<script>
   
</script>

@endsection()