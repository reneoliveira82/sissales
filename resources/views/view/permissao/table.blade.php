<table class="table table-striped table-bordered table-hover dt-responsive tabelaPT">
    <thead>
        <tr>
            <th>Nome</th>
            <th> Descrição</th>
            <th class="acoes_fixo-70"> Ações </th>
        </tr>
    </thead>
    <tbody>
        @foreach($registros as $reg)
        <tr>
            <td>{{ $reg->nome }}</td>

        <td>{{$reg->descricao }}</td>
            <td>

                <div class="actions">
                    <a class="btn btn-sm green btn-outline tooltips" title="Editar" onclick="editar('{{ $reg->id }}', '{{ $reg->nome }}', '{{ $reg->descricao }}');">
                        <i class="fa fa-edit"></i> </a>
                    <a class="btn btn-sm grey-salsa btn-outline tooltips" data-toggle="confirmation" data-funcao="excluir" data-id="{{ $reg->id }}" data-title="Deseja realmente excluir o registro?">
                        <i class="fa fa-trash"></i> </a>
                </div>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="{{asset('metronic/modelo/tabelaAjax.js')}}" type="text/javascript"></script>