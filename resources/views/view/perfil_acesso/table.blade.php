<table class="table table-striped table-bordered table-hover dt-responsive tabelaPT">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th class="acoes_fixo-150"> Permissões </th>
            @if (Gate::check('edit_perfil_acesso') || Gate::check('delete_perfil_acesso'))
            <th class="acoes_fixo-70"> Ações </th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($registros as $reg)
        @if ($reg->nome != 'Administrador')                
        <tr>
        
            <td>{{ $reg->nome }}</td>
            <td>{{ $reg->descricao }}</td>

            <td class="text-center">
                @can('view_perfil_permissao')
                <a class="btn btn-sm blue btn-outline" onclick="visualizarPermissao('{{ $reg->id }}')">Visualizar Permissões</a>
                @else
                <a class="btn btn-sm blue btn-outline" onclick="visualizarPermissao('alert')">Visualizar Permissões</a>
                @endcan
            </td>

            @if (Gate::check('edit_perfil_acesso') || Gate::check('delete_perfil_acesso'))
            <td>
                <div class="actions">
                    @can('edit_perfil_acesso')
                    <a class="btn btn-sm green btn-outline tooltips" title="Editar" onclick="editar('{{ $reg->id }}', '{{ $reg->nome }}', '{{ $reg->descricao }}');">
                        <i class="fa fa-edit"></i> </a>                        
                    @endcan

                    @can('delete_perfil_acesso')
                    <a class="btn btn-sm grey-salsa btn-outline tooltips" data-toggle="confirmation" data-funcao="excluir" data-id="{{ $reg->id }}" data-title="Deseja realmente excluir o registro?">
                        <i class="fa fa-trash"></i> </a>                        
                    @endcan
                </div>
            </td>
            @endif

        </tr>
        @endif
        @endforeach
    </tbody>
</table>

<script src="{{asset('metronic/modelo/tabelaAjax.js')}}" type="text/javascript"></script>