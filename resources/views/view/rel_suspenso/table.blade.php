
    <thead>
        <tr>
            <th>Matrícula</th>
            <th>Órgão</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Situação</th>           
        </tr>
    </thead>
    <tbody>  
    @foreach($registros as $registro)     
        <tr>
            <td>{{ $registro->matricula }}</td>
            <td>{{ $registro->orgao }}</td>
            <td>{{ $registro->nome }}</td>
            <td>{{ $registro->cpf }}</td>  
            <td>{{ $registro->rg }}</td>  
            <td> <span class='label label-sm ' style='background-color:#f54f4f;'>{{$registro->desc_status}}</span></td>   
        </tr>
    @endforeach
    <tr>
    <td>Total</td>
        <td></td>
        <td></td>
        <td ></td>
        <td ></td>
        <td align="center">{{$result}}</td>
    </tr>
</tbody> 
<script src="{{asset('metronic/modelo/tabelaAjax.js')}}" type="text/javascript"></script>
<script>

$("#data").html(table);
$(document).ready( function () {
    $('#tabela').DataTable({
        
                        "bFilter": false,    
                        responsive: true,
                        "language": {
                            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
                        },                       
                        
    	                dom: 'Bfrtip',
                        buttons: [ 
                            {                        
                            extend: 'pdfHtml5',
                            text: 'PDF',
                            attr: {
                                id: 'pdfbtn'                               
                                },
                                
                                pageSize: 'LEGAL',
                                customize: function(doc) {
                                doc.content[1].margin = [ 40, 0, 50, 0] //left, top, right, bottom
                                doc.defaultStyle.fontSize = 8;
                                doc.defaultStyle.alignment = 'center';   

                                        }   
                                    }
                                ]
                                
    });

    table.destroy();
});
</script>



