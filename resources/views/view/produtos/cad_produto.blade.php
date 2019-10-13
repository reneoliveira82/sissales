@extends('layout.default')

@section('titulo', 'Cadastrar Produtos | Sistema Vendas')

@section('conteudo')

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-head">
            <div class="page-title">
                <h1>Cadastro de Produtos</h1>
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
                            <span class="caption-subject bold uppercase">{{ isset($registros->id) ? 'Alterar Dados da' : 'Cadastrar' }} Produtos</span>

                        </div>
                    </div>

                    <div class="portlet-body">

                            <form role="form" id="form_produtos" method="post" data-toggle="validator" action="" class="form">
                                    @csrf
                                    <input type="hidden" name="_method" id="_method" value="">
                                
                                    <input type="hidden" name="codigo" id="codigo" value="{{ isset($registros->id) ? $registros->id : '' }}">
                                
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="cod_produto" class="control-label">Código do Produto:</label>
                                                <input required type="text" class="form-control" name="cod_produto" id="cod_produto" value="{{ isset($registros->nome_produto) ? $registros->nome_produto : '' }}" maxlength="100" autocomplete="of">
                                                <!--<div class="help-block with-errors"></div>-->
                                            </div>
                                        </div>
                                    </div>
                                

                                 <div class="row">
                                    <div class="col-sm-4 ">
                                            <div class="form-group">
                                                <label for="nome_produto" class="control-label">Nome do Produto:</label>
                                                <input required type="text" class="form-control" name="nome_produto" id="nome_produto" value="{{ isset($registros->cod_produto) ? $registros->cod_produto : '' }}" maxlength="100" autocomplete="of">
                                                <!--<div class="help-block with-errors"></div>-->
                                            </div>
                                        </div>
                                    </div>
                                    
                                <div class="row">
                                    <div class="col-sm-2 ">
                                            <div class="form-group">
                                                <label for="qtd_produto" class="control-label">Quantidade do Produto:</label>
                                                <input required type="text" class="form-control" name="qtd_produto" id="qtd_produto" value="{{ isset($registros->qtd_produto) ? $registros->qtd_produto : '' }}" maxlength="100" autocomplete="of">
                                                <!--<div class="help-block with-errors"></div>-->
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="form-body">
                                
                                        <div class="form-actions">
                                            <button type="submit" form="form_produtos" class="btn blue" onclick=" return salvar()" id="salvar_produto"><i class="fa fa-save"></i> Salvar</button>
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
if($("#id_produto").val() != ""){  


    var codigo = $('#codigo').val();
        if (codigo == '') {
            $("#form_produtos").attr("action", "{{ route('produtos.insert') }}");
        } else {
            $('#_method').val('put');
            
            $("#form_produtos").attr("action", "{{ route('produtos.update', '_codigo_') }}".replace('_codigo_', codigo));
        }
}else{
    $('.resp_validator').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>  <strong>Error: </strong> Informe o produto! </div>");
    
}
};
function retroceder() {      
    var pagina = "{{ route('produtos.index') }}";
    $(location).attr('href', pagina);
};
</script>
