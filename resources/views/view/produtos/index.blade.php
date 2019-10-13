@extends('layout.default')
@section('titulo','Cadastro de Produtos | Sistema de Vendas')
@section('conteudo')
<div class="page-content-wrapper">

<div class="page-content">

    <div class="page-head">
        <div class="page-title">
            <h1>Cadastro de Produtos</h1>
        </div>
    </div>
    <div class="date_validator">

    </div>
    @if(session('msg')){!! session('msg')!!} @endif
    <div class="row">
            <div class="col-md-12 ">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Lista de Produtos Cadastrados </span>
                        </div>
                    </div>
                   
                            <br>
                        <table id="tabela" class="table table-bordered table datatable responsive ">
                            <!-- A TABELA SERÁ INSERIDA AQUI-->
                        </table>
                        @can('create_produto')
                        <div class="row ">
                            <div class="col-md-12 ">
                                <div class="form-actions">
                                    <button type="button" class="btn blue" id="novo"> <i class="fa fa-plus"></i> Novo</button>

                                </div>
                            </div>
                        </div>                            
                        @endcan
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
<!-- Colocar scripts aqui-->
<script type="text/javascript">
    //Carrega tabela com todas as secretariass
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('produtos.tabela') }}",
            type: 'GET',
            data: {},
            beforeSend: function() {
                $('#tabela').html("<div class='row'><div class='col-md-12 text-center'><div class='col-md-12'><img src='{{asset('imagens/loading_circular.gif')}}' style='width: 30px'></div>Carregando</div></div>");
                //$('#tabela').html("<div class='text-center'>Carregando...</div>");
            },
            success: function(data) {
                $('#tabela').html(data);
            }
        });
    });
    $('#novo').click(function() {
        var pagina = "{{ route('cad_produto.cad') }}";
        $(location).attr('href', pagina);
    });
    function editar(o) {
       
        var pagina = "{{ route('cad_produto.cad', '_codigo_') }}".replace('_codigo_', o);
        $(location).attr('href', pagina);
    }
    function excluir(o) {
        var codigo = o.data('id');
        if (codigo != '') {
            var pagina = "{{ route('cad_produto.delete', '_codigo_') }}".replace('_codigo_', codigo);
            $(location).attr('href', pagina);
        }
    }


    </script>
@endsection()