@extends('layout.default')
@section('titulo','Relatório de Visita Domiciliar | Sistema Gestão de Recadastramento')
@section('conteudo')
<div class="page-content-wrapper">

<div class="page-content">

    <div class="page-head">
        <div class="page-title">
            <h1>Relatório</h1>
        </div>
    </div>
    <div class="date_validator">

    </div>
    @if(session('msg')){!! session('msg')} @endif
    <div class="row">
            <div class="col-md-12 ">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Relatório de Visita Domiciliar</span>
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
                            </div><!-- Fim do Row-->
                            <br>
                        <table id="tabela" class="table table-bordered table datatable responsive ">
                            <!-- A TABELA SERÁ INSERIDA AQUI-->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Colocar scripts aqui-->
<script type="text/javascript">
    //Carrega tabela com todas as secretariass
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('rel_visita.tabela') }}",
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
            $('.date_validator').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>  <strong>Error: </strong> Informe um periodo! </div>");                 
                       
            }else if(data_inicial !="" && data_final =="" || data_inicial =="" && data_final !=""){
                $('.date_validator').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>  <strong>Error: </strong> Informe os dois periodos! </div>");
                
            }else{
                $('.date_validator').html('');
                $.ajax({
                
                url: "{{ route('pesquisar.rel_visita.tabela') }}",
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
    </script>
@endsection()