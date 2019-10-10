                                       <thead>
                                            <tr role="row"><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 60px;">
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="group-checkable" id="checkStatus" data-set="#sample_1 .checkboxes">
                                                        <span></span>
                                                    </label>
                                                </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label=" Username : activate to sort column descending" style="width: 129px;"> Matrícula </th>
                                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Email : activate to sort column ascending" style="width: 198px;"> Órgão </th>
                                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Status : activate to sort column ascending" style="width: 96px;"> Nome </th>
                                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Joined : activate to sort column ascending" style="width: 96px;"> CPF </th>
                                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Joined : activate to sort column ascending" style="width: 96px;"> RG </th>
                                                <th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label=" Joined : activate to sort column ascending" style="width: 96px;"> Situação </th>
                                               
                                              </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($registros as $registro)
                                        <tr class="gradeX odd" role="row">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                    <input name="checarRegistro[]" id='{!!$registro->id!!}checarRegistro' onclick="getValorId('{{$registro->id}}')" type="checkbox" class="checkboxes" value="{!!$registro->nome!!}">
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td class="sorting_1"> {{ $registro->matricula}} </td>
                                                <td>{{ $registro->orgao }}</td>
                                                <td>{{ $registro->nome }}</td>
                                                <td name="showCPF[]" id="showCPF">{{ $registro->cpf }}</td>
                                                <td>{{ $registro->rg }}</td>
                                                <td><span name="showStatus[]" id="showStatus" class='label label-sm ' style='background-color:#ffcc00;'>{{$registro->desc_status}}</span></td>
                                                
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
    $("input:checked").each(function(){
      var id =  $(this).attr("id");
    if(id != "checkStatus" ){
      codigo_id.push(id.replace("checarRegistro","")); 
    }
  });
  }else{
    $('input:checkbox').prop("checked", false);
    codigo_id = [];
  }
  
  $("#codigo_id").val(codigo_id);
});
</script>