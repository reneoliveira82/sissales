<table class="table table-striped table-bordered table-hover dt-responsive tabelaPT">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Matricula</th>
            <th class="acoes_fixo-70"> Ativo</th>
            @if (Gate::check('edit_user') || Gate::check('delete_user'))
            <th class="acoes_fixo-70"> Ações </th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($registros as $reg)
        <tr>
            <td>{{ $reg->name }}</td>
            <td>{{ $reg->email}}</td>
            <td>{{ $reg->matricula}}</td>

            <td>
                @if ($reg->ativo == 'S')
                {!! "<span class='label label-sm ' style='background-color:#30b319;'>Sim</span>" !!}
                @else
                {!! "<span class='label label-sm ' style='background-color:#f54f4f;'>Não</span>" !!}
                @endif
            </td>

            @if (Gate::check('edit_user') || Gate::check('delete_user'))
            <td>
                <div class="actions">
                    @can('edit_user')
                    <a class="btn btn-sm green btn-outline tooltips" title="Editar" onclick="editar('{{ $reg->id }}');">
                        <i class="fa fa-edit"></i> </a>                        
                    @endcan

                    @can('delete_user')
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