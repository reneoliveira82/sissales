@extends('layout.default')

@section('titulo', 'Criar Usuário | Sistema Gestão de Recadastramento')

@section('conteudo')

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-head">
            <div class="page-title">
                <h1>Unidades SAC</h1>
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
                            <span class="caption-subject bold uppercase">{{ isset($registros->id) ? 'Alterar Dados da' : 'Cadastrar' }} Unidades SAC</span>

                        </div>
                    </div>

                    <div class="portlet-body">

                            <form role="form" id="form_sac_unidades" method="post" data-toggle="validator" action="" class="form">
                                    @csrf
                                    <input type="hidden" name="_method" id="_method" value="">
                                
                                    <input type="hidden" name="codigo" id="codigo" value="{{ isset($registros->id) ? $registros->id : '' }}">
                                
                                    <div class="row">
                                        <div class="col-sm-6 ">
                                            <div class="form-group">
                                                <label for="unid_descricao" class="control-label">Nome da unidade:</label>
                                                <input required type="text" class="form-control" name="unid_descricao" id="unid_descricao" value="{{ isset($registros->unid_descricao) ? $registros->unid_descricao : '' }}" maxlength="100" autocomplete="of">
                                                <!--<div class="help-block with-errors"></div>-->
                                            </div>
                                        </div>
                                    </div>
                                
                                    
                                    <div class="row">          
                                        <div class="col-sm-4 ">         
                                                <div class="input-group select2-bootstrap-prepend">  
                                                         
                                                    <label for="id_sac_tipo_unid">Tipo da Unidade</label>
                                                    <select id="id_sac_tipo_unid" name="id_sac_tipo_unid"   class="form-control select2"  > 
                                                        <option  value=""> --Selecione--</option>  
                                
                                                        @foreach ($sac_tipo_unidades as $rows_tipo_unidade_sac)
                                                   
                                                        <option  value="{{$rows_tipo_unidade_sac->id}}" {{ isset($registros->id_sac_tipo_unid) && $registros->id_sac_tipo_unid == $rows_tipo_unidade_sac->id ? "selected" : ""}}> {{ $rows_tipo_unidade_sac->tipo_descricao }}</option> 
                                                        @endforeach
                                                      
                                                    </select>
                                                </div><!-- FIM DO FORMGROUP -->
                                            </div> 
                                        </div>
                                
                                    <div class="form-body">
                                
                                        <div class="form-actions">
                                            <button type="submit" form="form_sac_unidades" class="btn blue" onclick=" return salvar()" id="salvar_sac_unidade"><i class="fa fa-save"></i> Salvar</button>
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
if($("#id_sac_tipo_unid").val() != ""){  


    var codigo = $('#codigo').val();
        if (codigo == '') {
            $("#form_sac_unidades").attr("action", "{{ route('sac_unidades.insert') }}");
        } else {
            $('#_method').val('put');
            
            $("#form_sac_unidades").attr("action", "{{ route('sac_unidades.update', '_codigo_') }}".replace('_codigo_', codigo));
        }
}else{
    $('.resp_validator').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>  <strong>Error: </strong> Informe o tipo da unidade! </div>");
    
}
};
function retroceder() {      
    var pagina = "{{ route('sac_unidades.index') }}";
    $(location).attr('href', pagina);
};
</script>
