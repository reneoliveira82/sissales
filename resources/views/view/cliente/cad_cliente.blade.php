@extends('layout.default')

@section('titulo', 'Cadastrar Clientes | Sistema Vendas')

@section('conteudo')

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-head">
            <div class="page-title">
                <h1>Cadastro de Clientes</h1>
            </div>

        </div>
        <div class="resp_validator">

        </div>

        @if (session('msg')) {!! session('msg') !!} @endif


        <div class="row">
            <div class="col-md-12 ">

                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-green">
                            <i class="icon-settings font-green"></i>
                            <span class="caption-subject bold uppercase">{{ isset($registros->id) ? 'Alterar Dados da' : 'Cadastrar' }} Cadastrar Clientes</span>

                        </div>
                    </div>

                    <div class="portlet-body">

                            <form role="form" id="form_clientes" method="post" data-toggle="validator" action="" class="form">
                                    @csrf
                                    <input type="hidden" name="_method" id="_method" value="">
                                
                                    <input type="hidden" name="codigo" id="codigo" value="{{ isset($registros->id) ? $registros->id : '' }}">
                                
                                    <div class="row">
                                        <div class="col-sm-6 ">
                                            <div class="form-group">
                                                <label for="nome_cliente" class="control-label">Nome do Cliente:</label>
                                                <input required type="text" class="form-control" name="nome_cliente" id="nome_cliente" value="{{ isset($registros->nome_cliente) ? $registros->nome_cliente : '' }}" maxlength="100" autocomplete="of">
                                                <!--<div class="help-block with-errors"></div>-->
                                            </div>
                                        </div>
                                    </div>
                                

                                 <div class="row">
                                    <div class="col-sm-3 ">
                                            <div class="form-group">
                                                <label for="cpf" class="control-label">CPF:</label>
                                                <input required type="text" class="form-control" name="cpf" id="cpf" value="{{ isset($registros->cpf) ? $registros->cpf : '' }}" maxlength="100" autocomplete="of">
                                                <!--<div class="help-block with-errors"></div>-->
                                            </div>
                                        </div>
                                    </div>
                                    
                                <div class="row">
                                    <div class="col-sm-3 ">
                                            <div class="form-group">
                                                <label for="telefone" class="control-label">Telefone:</label>
                                                <input required type="text" class="form-control" name="telefone" id="telefone" value="{{ isset($registros->telefone) ? $registros->telefone : '' }}" maxlength="100" autocomplete="of">
                                                <!--<div class="help-block with-errors"></div>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-6 ">
                                            <div class="form-group">
                                                <label for="email" class="control-label">E-mail:</label>
                                                <input required type="email" class="form-control" name="email" id="email" value="{{ isset($registros->email) ? $registros->email : '' }}" maxlength="100" autocomplete="of">
                                                <!--<div class="help-block with-errors"></div>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-body">
                                
                                        <div class="form-actions">
                                            <button type="submit" form="form_clientes" class="btn blue" onclick=" return salvar()" id="salvar_cliente"><i class="fa fa-save"></i> Salvar</button>
                                            <button type="button" class="btn default" id="voltar" onclick="retroceder()" name="voltar" ><i class="fa fa-undo"></i> Voltar</button>
                                            
                                        </div>
                                    </div>
                                
                                </form>

                    </div>
                </div>


            </div>
        </div>

    </div>
</div>

</div>
@endsection()
<script type="text/javascript">
function salvar () {
if($("#id_cliente").val() != ""){  


    var codigo = $('#codigo').val();
        if (codigo == '') {
            $("#form_clientes").attr("action", "{{ route('cliente.insert') }}");
        } else {
            $('#_method').val('put');
            
            $("#form_clientes").attr("action", "{{ route('cliente.update', '_codigo_') }}".replace('_codigo_', codigo));
        }
}else{
    $('.resp_validator').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>  <strong>Error: </strong> Informe o Cliente! </div>");
    
}
};
function retroceder() {      
    var pagina = "{{ route('cliente.index') }}";
    $(location).attr('href', pagina);
};
</script>
