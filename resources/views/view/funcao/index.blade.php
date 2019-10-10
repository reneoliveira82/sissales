@extends('layout.default')
@section('titulo','Cadastro de Funções | Sistema Gestão de Recadastramento')
@section('conteudo')

<div class="page-content-wrapper">

    <div class="page-content">

        <div class="page-head">
            <div class="page-title">
                <h1>Função</h1>
            </div>
        </div>

        @if (session('msg')) {!! session('msg') !!} @endif

        <form role="form" id="form_funcao" method="post" data-toggle="validator" action="">
            @csrf
            <input type="hidden" name="_method" id="_method" value="">

            @include('view.funcao._form')

        </form>

        <div class="row">
            <div class="col-md-12 ">

                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Lista de Funções</span>
                        </div>

                    </div>
                    <div class="portlet-body">

                        <div id="tabela">
                            <!-- A TABELA SERÁ INSERIDA AQUI-->
                        </div>

                        @can('create_funcao')
                        <div class="row ">
                            <div class="col-md-12 ">
                                <div class="form-actions">
                                    <button type="button" class="btn blue" onclick="novo()"> <i class="fa fa-plus"></i> Novo</button>

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

<script type="text/javascript">
    
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('funcao.tabela') }}",
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

    function novo() {

        $("#codigo").val("");
        $("#nome").val("");      
        $("#myModal").modal();
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

    }

    function editar(codigo, nome) {

        $("#codigo").val(codigo);
        $("#desc_funcao").val(nome);

        $("#myModal").modal();
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

    }

    function excluir(o) {
        var codigo = o.data('id');
        if (codigo != '') {
            $("#form_funcao").attr("action", "{{ route('funcao.delete', '_codigo_') }}".replace('_codigo_', codigo));
            document.forms[0].submit();
        }
    }

    $('#salvar').click(function() {
        var codigo = $('#codigo').val();
        if (codigo == '') {
            $("#form_funcao").attr("action", "{{ route('funcao.insert') }}");
        } else {
            $('#_method').val('put');
            $("#form_funcao").attr("action", "{{ route('funcao.update', '_codigo_') }}".replace('_codigo_', codigo));           
        }
    });
</script>

@endsection()