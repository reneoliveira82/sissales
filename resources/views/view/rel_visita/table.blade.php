
<thead>
    <tr>
        <th class="text-center">Matrícula</th>
        <th class="text-center">Órgão</th>
        <th class="text-center">Nome</th>
        <th class="text-center">CPF</th>
        <th class="text-center">RG</th>
        <th class="text-center">Situação</th>
    </tr>
</thead>

<tbody id="tableFull">
    @foreach($registros as $registro)
    <tr>
        <td class="text-center">{{ $registro->matricula}}</td>
        <td class="text-center">{{ $registro->orgao }}</td>
        <td class="text-center">{{ $registro->nome }}</td>
        <td class="text-center">{{ $registro->cpf }}</td>
        <td class="text-center">{{ $registro->rg }}</td>        
        <td class="text-center"> <span class='label label-sm ' style='background-color:#c0c0c0;'>{{$registro->desc_status}}</span></td>           
    </tr>
    @endforeach 
    <tr>
    <td class="text-center">Total</td>
        <td></td>
        <td></td>
        <td ></td>
        <td> </td>
        <td align="center">{{$result}}</td>
    </tr>
</tbody>
<script src="{{asset('metronic/modelo/tabelaAjax.js')}}" type="text/javascript"></script>
<script>

    $("#data").html(table);
    $(document).ready(function() {
        $('#tabela').DataTable({

            "bFilter": false,
            responsive: true,
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
            },

            dom: 'Bfrtip',
            buttons: [{
                extend: 'pdfHtml5',
                text: 'PDF',
                attr: {
                    id: 'pdfbtn'
                },

                pageSize: 'LEGAL',
                customize: function(doc) {
                    doc.content[1].margin = [40, 0, 50, 0] //left, top, right, bottom
                    doc.defaultStyle.fontSize = 8;
                    doc.defaultStyle.alignment = 'center';

                }
            }]

        });
        table.destroy();

    });

</script>