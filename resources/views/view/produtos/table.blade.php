<table class="table table-striped table-bordered table-hover dt-responsive tabelaPT">
        <thead>
            <tr>
                <th>Código do Produto</th>
                <th>Nome do Produto</th>
                <th>Quantidade de Produto</th>
    
                
                @if (Gate::check('edit_produtos') || Gate::check('delete_produtos'))
                <th class="acoes_fixo-70"> Ações </th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($registros as $reg)
            <tr>
                <td>{{$reg->cod_produto}}</td>
                <td>{{$reg->nome_produto}}</td>
                <td>{{$reg->qtd_produto}}</td>
                @if (Gate::check('edit_produtos') || Gate::check('delete_pordutos'))
                <td>
                    <div class="actions">
                        @can('edit_user')
                        <a class="btn btn-sm green btn-outline tooltips" title="Editar" onclick="editar('{{ $reg->id }}');">
                            <i class="fa fa-edit"></i> </a>                        
                        @endcan
    
                        @can('delete_sac_unidade')
                        <a class="btn btn-sm grey-salsa btn-outline tooltips" data-toggle="confirmation" data-funcao="excluir" data-id="{{ $reg->id }}" data-title="Deseja realmente excluir o produto?">
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