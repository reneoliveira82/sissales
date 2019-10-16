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
                            <span class="caption-subject bold uppercase">Sistema Vendas</span>
                        </div>

                    </div>
                    <div class="portlet-body">
                        <!-- @php
                        $nome_completo = explode(' ', Auth::user()->name);
                        $nome = $nome_completo[0];
                        @endphp                         -->
                        <i class="fa fa-thumbs-o-up fa-2x"></i> Bem Vindo, {{ $nome }}!<br>
                        {{-- <br>Para começar, escolha uma das opções ao lado. --}}<br>

                    </div>
                    <div>
                       
                    <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ route('vendas.index')}}">
                                                    <div class="visual">
                                                        <i class="fa fa-comments"></i>
                                                    </div>
                                                    <div class="details">
                                                        <div class="number">
                                                            <span data-counter="counterup" data-value=""> Vendas </span>
                                                        </div>
                                                        <div class="desc"> Inicie uma venda </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <a class="dashboard-stat dashboard-stat-v2 red" href="{{ route('produtos.index') }}">
                                                    <div class="visual">
                                                        <i class="fa fa-comments"></i>
                                                    </div>
                                                    <div class="details">
                                                        <div class="number">
                                                            <span data-counter="counterup" data-value="">Cadastrar Produtos </span></div>
                                                        <div class="desc"> Produtos </div>
                                                    </div>
                                                </a>
                                            </div>
                                            
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <a class="dashboard-stat dashboard-stat-v2 green" href="{{ route('cliente.index')}}">
                                                    <div class="visual">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                    <div class="details">
                                                        <div class="number">
                                                            <span data-counter="counterup" data-value=""> Cadastrar Clientes </span>
                                                        </div>
                                                        <div class="desc"> Clientes </div>
                                                    </div>                                    
                                                </a>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                                    <div class="visual">
                                                        <i class="fa fa-globe"></i>
                                                    </div>
                                                    <div class="details">
                                                        <div class="number">
                                                            <span data-counter="counterup" data-value=""></span> Em desenvolvimento </div>
                                                        <div class="desc"> Em desenvolvimento </div>

                                                    </div>

                                                </a>
                                            </div><!-- Fim do Col -->

                                        </div><!-- Fim do Row -->
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