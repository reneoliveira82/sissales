@extends('layout.default')

@section('titulo', 'Usuários | Sistema Gestão de Recadastramento')

@section('conteudo')

<div class="page-content-wrapper">

    <div class="page-content">

        <div class="page-head">
            <div class="page-title">
                <h1>Usuário</h1>
            </div>
        </div>

        @if (session('msg')) {!! session('msg') !!} @endif

        <div class="row">
            <div class="col-md-12 ">

                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Lista de Usuários para Aprovação de Conta</span>
                        </div>

                    </div>
                    <div class="portlet-body">

                        <div id="tabela">
                            <!-- A TABELA SERÁ INSERIDA AQUI-->
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

<script type="text/javascript">
    //Carrega tabela com todos os usuários
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('usuario.tabela') }}",
            type: 'GET',
            data: {
                solicita_conta : 'S'
            },
            beforeSend: function() {
                $('#tabela').html("<div class='row'><div class='col-md-12 text-center'><div class='col-md-12'><img src='{{asset('imagens/loading_circular.gif')}}' style='width: 30px'></div>Carregando</div></div>");
                //$('#tabela').html("<div class='text-center'>Carregando...</div>");
            },
            success: function(data) {
                $('#tabela').html(data);
            }
        });
    });

    function editar(o) {
        var pagina = "{{ route('usuario.cad.aprovar', ['_codigo_', 'aprovacao']) }}".replace('_codigo_', o);
        $(location).attr('href', pagina);
    }

    function excluir(o) {
        var codigo = o.data('id');
        if (codigo != '') {
            var pagina = "{{ route('usuario.delete', '_codigo_') }}".replace('_codigo_', codigo);
            $(location).attr('href', pagina);
        }
    }
</script>

@endsection()