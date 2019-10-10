@extends('layout.default')

@section('titulo', 'Permissão | Sistema Gestão de Recadastramento')

@section('conteudo')

<div class="page-content-wrapper">

    <div class="page-content">

        <div class="page-head">
            <div class="page-title">
                <h1>Permissão</h1>
            </div>
        </div>

        @if (session('msg')) {!! session('msg') !!} @endif

        <form role="form" id="form_permissao" method="post" data-toggle="validator" action="">
            @csrf
            <input type="hidden" name="_method" id="_method" value="">

            @include('view.permissao._form')

        </form>

        <div class="row">
            <div class="col-md-12 ">

                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Lista de Permissões</span>
                        </div>

                    </div>
                    <div class="portlet-body">

                        <div id="tabela">
                            <!-- A TABELA SERÁ INSERIDA AQUI-->
                        </div>

                        <div class="row ">
                            <div class="col-md-12 ">
                                <div class="form-actions">
                                    <button type="button" class="btn blue" onclick="novo()"> <i class="fa fa-plus"></i> Novo</button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

<script type="text/javascript">

    function novo() {

        $("#codigo").val("");
        $("#nome").val("");
        $('#descricao').val("");
        // $("#ativo").prop("checked", false);
        $("#myModal").modal();
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

    }

    function editar(codigo, nome, descricao) {

        $("#codigo").val(codigo);
        $("#nome").val(nome);
        $('#descricao').val(descricao);

        // if (ativo == 'S') {
        //     $("#ativo").prop("checked", true);
        // } else {
        //     $("#ativo").prop("checked", false);
        // }



        $("#myModal").modal();
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

    }

    function excluir(o) {
        var codigo = o.data('id');
        if (codigo != '') {
            $("#form_permissao").attr("action", "{{ route('permissao.delete', '_codigo_') }}".replace('_codigo_', codigo));
            document.forms[0].submit();
        }
    }

    $('#salvar').click(function() {
        var codigo = $('#codigo').val();
        if (codigo == '') {
            $("#form_permissao").attr("action", "{{ route('permissao.insert') }}");
        } else {
            $('#_method').val('put');
            $("#form_permissao").attr("action", "{{ route('permissao.update', '_codigo_') }}".replace('_codigo_', codigo));
        }
    });
</script>

@endsection()