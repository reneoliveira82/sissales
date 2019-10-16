@extends('layout.default')

@section('titulo', 'Vendas | Sistema de Vendas')

@section('conteudo')

<div class="page-content-wrapper">

    <div class="page-content">

        <div class="page-head">
            <div class="page-title">
                <h1>Vendas</h1>
            </div>
        </div>

        <div class="_validator">

        </div>

        @if (session('msg')) {!! session('msg') !!} @endif

        <div class="row">
            <div class="col-md-12 ">

                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Lista de Produtos</span>
                        </div>

                    </div>
                    <div class="portlet-body">
                    <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="rec_codigo_prod" class="">Código do Produto:</label>
                                        <input  type="text"  class="form-control" id="rec_codigo_prod"  name="rec_codigo_prod" placeholder="" value="">
                                    </div><!-- FIM DO FORMGROUP -->
                                </div><!-- Fim do Col -->
 
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="rec_nome_prod" class="">Nome do Produto:</label>
                                        <input type="text" maxlength="50" class="form-control"  id="rec_nome_prod" name="rec_nome" placeholder="" value="">
                                    </div><!-- FIM DO FORMGROUP -->
                                </div><!-- Fim do Col -->                                                               
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <br>
                                        <button class="btn btn-primary" id="pesquisar">Pesquisar</button>
                                    </div><!-- FIM DO FORMGROUP -->
                                </div><!-- Fim do Col -->                               
                            </div><!-- Fim do Row-->
                            <br>

                        <table id="tabela" class="table table-bordered table datatable responsive ">
                            <!-- A TABELA SERÁ INSERIDA AQUI-->
                        </table>  
                        <br>
                        <h2 style="display:none;" id="buyMsg">Produtos selecionados</h2>
                        <h2>
                        <input type="hidden" name="identificador" id="identificador" value="">
                        <table  id="compras" style="display:none;"  class="table table-bordered table datatable responsive ">
                        <thead> 
                            <tr>
                            <th><button class="btn btn-danger" id="removerAll">remove todos</button></th>
                                <th>Código do produto</th>
                                <th>Produto</th>
                                <th> Quantidade </th>
                                <th> Valor unitário </th>
                            </tr>
                        </thead>
                            <tbody id="add_Produtos">
                       
                            </tbody>
                                                     
                        </table>
                    
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

<script type="text/javascript">



   //Carrega tabela com todos os usuários
    // $(document).ready(function() {
    //     $.ajax({
    //         url: "{{ route('vendas.tabela') }}",
    //         type: 'GET',
    //         data: {},
    //         beforeSend: function() {
    //             $('#tabela').html("<div class='row'><div class='col-md-12 text-center'><div class='col-md-12'><img src='{{asset('imagens/loading_circular.gif')}}' style='width: 30px'></div>Carregando</div></div>");
    //             //$('#tabela').html("<div class='text-center'>Carregando...</div>");
    //         },
    //         success: function(data) {
    //             data ='';
    //             $('#tabela').html(data);
    //         }
    //     });
    // });


    jQuery(function($){
     
     $("#rec_matricula").mask("9999999999");
     $("#rec_cpf").mask("999.999.999-99");
    });
    

    $('#pesquisar').click(function() {   
         
    //      var rec_matricula = $('#rec_matricula').val();
    //      var rec_cpf = $('#rec_cpf').val();
    //      var rec_nome = $('#rec_nome').val();
         

    //      if(rec_matricula != '' || rec_cpf != '' || rec_nome != ''){
           
    //         $.ajax({
                 
    //              url: "{{ route('pesquisar.vendas.tabela') }}",
    //              type: 'GET',
    //              data: {
    //              r_matricula : rec_matricula,
    //              r_cpf : rec_cpf,
    //              r_nome : rec_nome   
    //              },
    //              beforeSend: function() {
    //                  $('#tabela').html("<div class='row'><div class='col-md-12 text-center'><div class='col-md-12'><img src='{{asset('imagens/loading_circular.gif')}}' style='width: 30px'></div>Carregando</div></div>");
    //                  //$('#tabela').html("<div class='text-center'>Carregando...</div>");
                     
    //              },
    //              success: function(data) {                    
    //                  $('#tabela').html(data);
                     
    //              },
                 
                 
    //              });
    //      }else{ 
    //         $('._validator').html("<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>  <strong>Error: </strong> Preencha algum dos campos para pesquisar! </div>");
    //      } 
         
    var rec_codigo_prod = $("#rec_codigo_prod").val();
    var rec_nome_prod = $("#rec_nome_prod").val();
    if(rec_codigo_prod !="" || rec_nome_prod != ""){
    $.ajax({
                url: "{{ route('pesquisar.vendas.tabela') }}",
                type: 'GET',
                data: {            
                    rec_codigo_prods : rec_codigo_prod,
                    rec_nome_prods : rec_nome_prod   
                },
                beforeSend: function() {
                    $('#tabela').html("<div class='row'><div class='col-md-12 text-center'><div class='col-md-12'><img src='{{asset('imagens/loading_circular.gif')}}' style='width: 30px'></div>Carregando</div></div>");
                    $('#tabela').html("<div class='text-center'>Carregando...</div>");
                    
                },
                success: function(data) {                    
                    $('#tabela').html(data);
                    
                },
            
             
            });
                
        }
     });
    

    // function editar(o) {
    //     var pagina = "{{ route('recad_suprev.cad', '_codigo_') }}".replace('_codigo_', o);
    //     $(location).attr('href', pagina);
    // }


    
    
</script>

@endsection()