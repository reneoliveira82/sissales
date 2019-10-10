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
                            <span class="caption-subject font-green bold uppercase">Lista de Usuários</span>
                        </div>

                    </div>
                    <div class="portlet-body">

                        <div id="tabela">
                            <!-- A TABELA SERÁ INSERIDA AQUI-->
                        </div>

                        @can('create_user')
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

<script type="text/javascript">
    //Carrega tabela com todos os usuários
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('usuario.tabela') }}",
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
        var pagina = "{{ route('usuario.cad') }}";
        $(location).attr('href', pagina);
    });

    function editar(o) {
        var pagina = "{{ route('usuario.cad', '_codigo_') }}".replace('_codigo_', o);
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