<table class="table table-striped table-bordered table-hover dt-responsive tabelaPT">
    <thead>
        <tr>
            <th>Funções</th>           
            @if (Gate::check('edit_funcao') || Gate::check('delete_funcao'))
            <th class="acoes_fixo-70"> Ações </th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($registros as $reg)
        <tr>
            <td>{{ $reg->desc_funcao }}</td>           

            @if (Gate::check('edit_funcao') || Gate::check('delete_funcao'))
            <td>
                <div class="actions">
                @can('edit_funcao')
                    <a class="btn btn-sm green btn-outline tooltips" title="Editar" onclick="editar('{{ $reg->id }}', '{{ $reg->desc_funcao }}');">
                        <i class="fa fa-edit"></i> </a>
                @endcan

                @can('delete_funcao')
                <a class="btn btn-sm grey-salsa btn-outline tooltips" data-toggle="confirmation" data-funcao="excluir" data-id="{{ $reg->id }}" data-title="Deseja realmente excluir o registro?">
                    <i class="fa fa-trash"></i> </a>                    
                @endcan
                
                </div>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

<script src="{{asset('metronic/modelo/tabelaAjax.js')}}" type="text/javascript"></script>