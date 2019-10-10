@extends('layout.default')

@section('titulo', 'Perfil Permissão | Sistema Gestão de Recadastramento')

@section('conteudo')

<div class="page-content-wrapper">

    <div class="page-content">

        <div class="page-head">
            <div class="page-title">
                <h1>Perfil Permissão</h1>
            </div>
        </div>

        @if (session('msg')) {!! session('msg') !!} @endif

        <div class="row">
            <div class="col-md-6">
                <div class="portlet light bordered">
                    <div class="portlet-body">

                        <form role="form" id="form_perfil_permissao" method="post" data-toggle="validator" action="" class="form-horizontal">
                            @csrf
                            <input type="hidden" name="_method" id="_method" value="">

                            @include('view.perfil_permissao._form')

                        </form>

                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                @include('view.perfil_permissao.table')
            </div>

        </div>

        <div class="row">
        </div>

    </div>

</div>

<script type="text/javascript">

    function excluir(o) {
        var codigo = o.data('id');
        if (codigo != '') {
            $("#form_perfil_permissao").attr("action", "{{ route('perfil_permissao.delete', '_codigo_') }}".replace('_codigo_', codigo));
            document.forms[0].submit();
        }
    }

    $('#salvar').click(function() {
        var codigo = $('#codigo').val();
        if (codigo == '') {
            $("#form_perfil_permissao").attr("action", "{{ route('perfil_permissao.insert') }}");
        }
    });

    $('#voltar').click(function() {
        var pagina = "{{ route('perfil_acesso.index') }}";
        $(location).attr('href', pagina);
    });

    $('#my_multi_select2').change(function(){
        $('#salvar').prop('disabled', false);
    });
    
    @if ($registros->count() >= 1)
        @foreach($registros as $reg)
            $('#my_multi_select2 option[value= {{$reg->p_id}}]').attr('selected', 'selected').trigger('change');            
        @endforeach
    @endif
</script>

@endsection()