
    <thead>
        <tr>
            <th>Matricula</th>
            <th>Órgão</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>RG</th>
            <th class="acoes_fixo-70">Situação</th>
            @if (Gate::check('edit_recad_suprev') || Gate::check('delete_recad_suprev'))
            <th class="acoes_fixo-70"> Ações </th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($registros as $reg)
        <tr>
            <td>{{$reg->matricula}}</td>
            <td>{{$reg->orgao}}</td>
            <td>{{$reg->nome}}</td>
            <td>{{$reg->cpf}}</td>
            <td>{{$reg->rg}}</td>
            <td>
            @if ($reg->id_status == '1')
                {!! " <span class='label label-sm ' style='background-color:#ffcc00;'> Em recadastramento </span> " !!} 
                @elseif ($reg->id_status == '2')
                {!! "<span class='label label-sm ' style='background-color:#30b319;'> Recadastrado </span>" !!}
                @elseif ($reg->id_status == '3')
                {!! "<span class='label label-sm ' style='background-color:#c0c0c0;'> Visita Domiciliar </span>" !!}
                @elseif ($reg->id_status == '4')
                {!! "<span class='label label-sm ' style='background-color:#f54f4f;'> Suspenso </span>" !!}
                @elseif ($reg->id_status == '5')
                {!! "<span class='label label-sm ' style='background-color:#4f90cc;'> Desligado </span>" !!}
                @endif
            </td>

            @if (Gate::check('edit_recad_suprev') || Gate::check('delete_recad_suprev'))
            <td>
                <div class="actions">
                    @can('edit_recad_suprev')
                    <a class="btn btn-sm green btn-outline tooltips" title="Recadastrar" onclick="editar({{$reg->id}});">
                        <i class="fa fa-edit"></i> </a>                        
                    @endcan
                </div>
            </td>
            @endif

        </tr>
        @endforeach
        
    </tbody>


<script src="{{asset('metronic/modelo/tabelaAjax.js')}}" type="text/javascript"></script>


<script>

$("#data").html(table);
$(document).ready( function () {
    $('#tabela').DataTable({
        
        "bFilter": false,
        "paging": false,
        responsive: true,
                        "language": {
                            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
                        }
    });

    table.destroy();
});
</script>