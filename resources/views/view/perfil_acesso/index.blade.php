@extends('layout.default')

@section('titulo', 'Perfil de Acesso | Sistema Gestão de Recadastramento')

@section('conteudo')

<div class="page-content-wrapper">

    <div class="page-content">

        <div class="page-head">
            <div class="page-title">
                <h1>Perfil de Acesso</h1>
            </div>
        </div>

        @if (session('msg')) {!! session('msg') !!} @endif

        <form role="form" id="form_perfil_acesso" method="post" data-toggle="validator" action="">
            @csrf
            <input type="hidden" name="_method" id="_method" value="">

            @include('view.perfil_acesso._form')

        </form>

        <div class="row">
            <div class="col-md-12 ">

                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Lista de Perfis</span>
                        </div>

                    </div>
                    <div class="portlet-body">

                        <div id="tabela">
                            <!-- A TABELA SERÁ INSERIDA AQUI-->
                        </div>

                        @can('create_perfil_acesso')
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
            url: "{{ route('perfil_acesso.tabela') }}",
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
            $("#form_perfil_acesso").attr("action", "{{ route('perfil_acesso.delete', '_codigo_') }}".replace('_codigo_', codigo));
            document.forms[0].submit();
        }
    }

    $('#salvar').click(function() {
        var codigo = $('#codigo').val();
        if (codigo == '') {
            $("#form_perfil_acesso").attr("action", "{{ route('perfil_acesso.insert') }}");
        } else {
            $('#_method').val('put');
            $("#form_perfil_acesso").attr("action", "{{ route('perfil_acesso.update', '_codigo_') }}".replace('_codigo_', codigo));
        }
    });

    function visualizarPermissao(codigo) {
        if (codigo == 'alert'){
            swal({
                position: 'center',
                type: 'warning',
                title: 'Você não tem permissão.',
                showConfirmButton: true
            });
        }else{
            var pagina = "{{ route('perfil_permissao.index', '_codigo_') }}".replace('_codigo_', codigo);
            $(location).attr('href', pagina);
        }
    }
</script>

@endsection()