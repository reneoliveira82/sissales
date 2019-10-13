<table class="table table-striped table-bordered table-hover dt-responsive tabelaPT">
        <thead>
            <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
                
                @if (Gate::check('edit_cliente') || Gate::check('delete_cliente'))
                <th class="acoes_fixo-70"> Ações </th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($registros as $reg)
            <tr>
                <td>{{$reg->cpf}}</td>
                <td>{{$reg->nome_cliente}}</td>
                <td>{{$reg->telefone}}</td>
                <td>{{$reg->email}}</td>
                @if (Gate::check('edit_sac_unidade') || Gate::check('delete_sac_unidade'))
                <td>
                    <div class="actions">
                        @can('edit_user')
                        <a class="btn btn-sm green btn-outline tooltips" title="Editar" onclick="editar('{{ $reg->id }}');">
                            <i class="fa fa-edit"></i> </a>                        
                        @endcan
    
                        @can('delete_sac_unidade')
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