<thead>
    <tr role="row"><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 60px;">
            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                <input type="checkbox" class="group-checkable" id="checkStatus" data-set="#sample_1 .checkboxes">
                <span></span>
            </label>
        </th>
       
        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Email : activate to sort column ascending" style="width: 198px;"> Código do Produto</th>
        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Status : activate to sort column ascending" style="width: 96px;"> Nome do Produto </th>
        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Joined : activate to sort column ascending" style="width: 96px;">Quantidade de Produto</th>
        <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Joined : activate to sort column ascending" style="width: 96px;">Valor unitário</th>
      
        
        </tr>
</thead>
<tbody>
@foreach($registros as $reg)
<tr class="gradeX odd" role="row">
        <td>
            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
            <input name="checarRegistro[]" id='{!!$reg->id!!}checarRegistro' onclick="add(this.id)" type="checkbox" class="checkboxes" value="">
                <span></span>
            </label>
        </td>
        <td id="{!!$reg->id!!}ap_cod_produto"class="sorting_1"> {{$reg->cod_produto}}</td>
        <td id="{!!$reg->id!!}ap_nome_produto">{{$reg->nome_produto}}</td>
        <td id="{!!$reg->id!!}ap_qtd_produto" >{{$reg->qtd_produto}}</td>
        <td id="{!!$reg->id!!}ap_preco_unit" >{{$reg->preco_unit}}</td>
        
        
        </tr>
    @endforeach 
</tbody>
<script src="{{asset('metronic/modelo/tabelaAjax.js')}}" type="text/javascript"></script>
<script>
  var codigo_id = [];

  
var checkTodos = $("#checkStatus");
checkTodos.click(function () {
  if ( $(this).is(':checked') ){
    $('input:checkbox').prop("checked", true);
    $("#buyMsg").show();
    $("#compras").show();
   
    $("table[id='tabela'] input:checked").each(function(){
      var id =  $(this).attr("id");
    
    if(id != "checkStatus" ){
       var ap_cod_produto = $("#"+id.replace("checarRegistro","")+"ap_cod_produto").text();
       var ap_nome_produto = $("#"+id.replace("checarRegistro","")+"ap_nome_produto").text();
       var ap_preco_unit = $("#"+id.replace("checarRegistro","")+"ap_preco_unit").text();
      novoId = id.replace("checarRegistro","");
       
        initTableCompras(ap_cod_produto,ap_nome_produto,ap_preco_unit,novoId);
        
    //   codigo_id.push(id.replace("checarRegistro","")); 
    }
   
  });
 
 
  }else{
    $('input:checkbox').prop("checked", false);
    
    // codigo_id = [];
  }
  
//   $("#codigo_id").val(codigo_id);
});

function initTableCompras(ap_cod_produto,ap_nome_produto,ap_preco_unit,novoId){
    var conteudo = $("table[id='tabela'] input:checked");
 if($("#"+novoId+"checarRegistro").is(':checked')){
        document.getElementById("add_Produtos").innerHTML+=
  "<tr id='"+novoId+"row' >"+
      "<td>"+
          "<button class='btn btn-danger' id='"+novoId+"remover' onclick='remove(this.id)'>remover</button>"+
      "</td>"+ 
      "<td id='"+novoId+"buyCodigo'>"+
      ap_cod_produto
      +"</td>"+
      "<td id='"+novoId+"buyProdutos'>"+
      ap_nome_produto
      +"</td>"+
      "<td id='"+novoId+"buyQuantidade'>"+
      "<input type='number' name='buy_quantidade' id='"+novoId+"'buy_quantidade' onclick='getValor()' value=''>"
      +"</td>"+
      "</td>"+
      "<td id='"+novoId+"buy_preco_unit'>"+
        ap_preco_unit
      +"</td>"+
  "</tr>";
  }else{
    $("#"+novoId+"row").remove();
  }
}

function remove(id){
  newid = id.replace("remover", ""); 
  $("#"+newid+"row").remove();
};
$("#removerAll").click(function removeAll(){

$("#add_Produtos").children().remove();
});

function add(id){
  $("#buyMsg").show();
    $("#compras").show();
  if(id != "checkStatus" ){
       var ap_cod_produto = $("#"+id.replace("checarRegistro","")+"ap_cod_produto").text();
       var ap_nome_produto = $("#"+id.replace("checarRegistro","")+"ap_nome_produto").text();
      novoId = id.replace("checarRegistro","");
       
        initTableCompras(ap_cod_produto,ap_nome_produto,novoId);
        
    //   codigo_id.push(id.replace("checarRegistro","")); 
    }

};

function getValor(){
  var minha_quantidade = $(this).attr('id');
  var meu_valor_unit = $(this).attr('id');
  var valor_unitario = $("#"+meu_valor_unit+"").text();
  var valor_quantidade = $("#"+minha_quantidade+"").text();


  
};
</script>