@extends('layout.default')
@section('titulo','Alterar Situação | Sistema Gestão de Recadastramento')
@section('conteudo')
<div class="page-content-wrapper">

<div class="page-content">

    <div class="page-head">
        <div class="page-title">
     
            <h1>Lista em Recadastramento </h1>
        </div>
    </div>
    <div class="date_validator">

    </div>
    @if(session('msg')){!! session('msg') !!} @endif
    <div class="row">
            <div class="col-md-12 ">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Lista com Situação Em Recadastramento</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="data_inicial" class="">Data inicial:</label>
                                        <input  type="text" class="form-control" id="data_inicial" name="data_inicial" placeholder="" value="">
                                       
                                    </div><!-- FIM DO FORMGROUP -->
                                </div><!-- Fim do Col -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="data_final" class="">Data final:</label>
                                        <input type="text" class="form-control"  id="data_final" name="data_final" placeholder="" value="">
                                        
                                        </div><!-- FIM DO FORMGROUP -->
                                </div><!-- Fim do Col -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <br>
                                        <button class="btn btn-primary" id="pesquisar">Pesquisar</button>
                                    </div><!-- FIM DO FORMGROUP -->
                                </div><!-- Fim do Col -->        

                            </div><!-- Fim do Row-->
                                <form method="POST" id="form_em_recadastramento" >
                                    @csrf
                                    <input type="hidden" name="codigo_id" id="codigo_id" value="">
                                </form>
                            </div><!-- Fim do Row-->
                            <br>
                        <table id="tabela" class="table table-bordered table datatable responsive ">
                            <!-- A TABELA SERÁ INSERIDA AQUI-->
                        </table>
                            
                        <div class="form-actions">
                           <button type="submit" form="form_em_recadastramento" class="btn blue" id="btn_submit"><span class="fa fa-edit"></span> Alterar </button>
                        </div>
                    </div>
                   
                </div>
            </div>
           
        </div>
    </div>

</div>
<!-- Colocar scripts aqui-->
<script type="text/javascript">

    //Carrega tabela
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('rel_recadastramento.tabela') }}",
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
    jQuery(function($){
     $("#data_inicial").mask("99/99/9999");
     $("#data_final").mask("99/99/9999");
    });

    $('#pesquisar').click(function() {        
        var data_inicial = $('#data_inicial').val();
        var data_final = $('#data_final').val();

        if (data_inicial =="" && data_final ==""){                    
            $('.date_validator').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>  <strong>Error: </strong> Informe o Período </div>");
          
            }else if(data_inicial !="" && data_final =="" || data_inicial =="" && data_final !=""){
                $('.date_validator').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>  <strong>Error: </strong> Informe os dois Períodos </div>");
            }else{
                $('.date_validator').html('');
              
                $.ajax({
                
                url: "{{ route('pesquisar.rel_recadastramento.tabela') }}",
                type: 'GET',
                data: {
                dt_inicial : data_inicial,
                dt_final : data_final
                },
                beforeSend: function() {
                    $('#tabela').html("<div class='row'><div class='col-md-12 text-center'><div class='col-md-12'><img src='{{asset('imagens/loading_circular.gif')}}' style='width: 30px'></div>Carregando</div></div>");
                    //$('#tabela').html("<div class='text-center'>Carregando...</div>");
                    
                },
                success: function(data) {                    
                    $('#tabela').html(data);  
                },   
                });
            }      
    });

    function getValorId(id){      
        $("#codigo_id").val(id);      
    }
    $("#btn_submit").click(function(){      
        $("#form_em_recadastramento").attr("action","{{ route('rel_recadastramento.update_servidor') }}");
    });

    </script>
@endsection()