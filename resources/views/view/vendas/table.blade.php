
    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Quantidade</th>          
        </tr>
    </thead>
    <tbody>  
      
        <tr>
            <td>01</td>
            <td>Ice</td>
            <td>R$ 5.00</td>
            <td>30</td>   
            <td> <span class='label label-sm ' style='background-color:#ffcc00;'>{{$registro->desc_status}}</span></td>   
        </tr>
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


