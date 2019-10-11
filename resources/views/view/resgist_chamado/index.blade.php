@extends('layout.default')
@section('titulo','Consultar Chamados| Sistema Inspeção de Chamados')
@section('conteudo')
<div class="page-content-wrapper">

    <div class="page-content">
    
        <div class="page-head">
            <div class="page-title">
                <h1>Listar Chamados</h1>
            </div>
        </div>
        @if(session('msg')){!! session('msg')} @endif
        <div class="row">
                <div class="col-md-12 ">
    
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-green"></i>
                                <span class="caption-subject font-green bold uppercase">Consultar Chamados</span>
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
    
                                </div><!-- Fim do Row-->
                            <div id="tabela">
                                <!-- A TABELA SERÁ INSERIDA AQUI-->
                            </div>
    
                            @can('create_user')
                            <!-- <div class="row ">
                                <div class="col-md-12 ">
                                    <div class="form-actions">
                                        <button type="button" class="btn blue" id="novo"> <i class="fa fa-plus"></i> Novo</button>
    
                                    </div>
                                </div>
                            </div>                             -->
                            @endcan
    
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
        </script>
    @endsection()