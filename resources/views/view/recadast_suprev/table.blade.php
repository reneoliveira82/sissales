
<table class="table table-striped table-bordered table-hover dt-responsive tabelaPT">
    <thead>
        <tr>
            <th>Matriclua</th>
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
            <td>12345678</td>
            <td>MP</td>
            <td>Fulano da Silva</td>
            <td>000.111.222-33</td>
            <td>00.111.222-00</td>
            <td>
            
                {!! " <span class='label label-sm ' style='background-color:#30b319;'>Recadastrado</span>" !!}
    
            </td>

            @if (Gate::check('edit__recad_suprev') || Gate::check('delete_recad_suprev'))
            <td>
                <div class="actions">
                    @can('edit_recad_suprev')
                    <a class="btn btn-sm green btn-outline tooltips" title="Editar" onclick="editar();">
                        <i class="fa fa-edit"></i> </a>                        
                    @endcan

                    @can('delete_recad_suprev')
                    <a class="btn btn-sm grey-salsa btn-outline tooltips" data-toggle="confirmation" data-funcao="excluir" data-id="{{ $reg->id }}" data-title="Deseja realmente excluir o registro?">
                        <i class="fa fa-trash"></i> </a>                        
                    @endcan
                </div>
            </td>
            @endif

        </tr>
        <tr>
            <td>12345678</td>
            <td>TJ</td>
            <td>Beltrano da Silva</td>
            <td>000.111.222-33</td>
            <td>00.111.222-00</td>
            <td>
                 {!! " <span class='label label-sm ' style='background-color:#f54f4f;'>Desligado</span>" !!}
              
            </td>

            @if (Gate::check('edit__recad_suprev') || Gate::check('delete_recad_suprev'))
            <td>
                <div class="actions">
                    @can('edit_recad_suprev')
                    <a class="btn btn-sm green btn-outline tooltips" title="Editar" onclick="editar();">
                        <i class="fa fa-edit"></i> </a>                        
                    @endcan

                    @can('delete_recad_suprev')
                    <a class="btn btn-sm grey-salsa btn-outline tooltips" data-toggle="confirmation" data-funcao="excluir" data-id="{{ $reg->id }}" data-title="Deseja realmente excluir o registro?">
                        <i class="fa fa-trash"></i> </a>                        
                    @endcan
                </div>
            </td>
            @endif

        </tr>
        <tr>
            <td>12345678</td>
            <td>SUPREV</td>
            <td>Ciclano da Silva</td>
            <td>000.111.222-33</td>
            <td>00.111.222-00</td>
            <td>
      
                {!! " <span class='label label-sm ' style='background-color:#ffbf00;'>Suspenso</span>" !!}

            </td>

            @if (Gate::check('edit__recad_suprev') || Gate::check('delete_recad_suprev'))
            <td>
                <div class="actions">
                    @can('edit_recad_suprev')
                    <a class="btn btn-sm green btn-outline tooltips" title="Editar" onclick="editar();">
                        <i class="fa fa-edit"></i> </a>                        
                    @endcan

                    @can('delete_recad_suprev')
                    <a class="btn btn-sm grey-salsa btn-outline tooltips" data-toggle="confirmation" data-funcao="excluir" data-id="{{ $reg->id }}" data-title="Deseja realmente excluir o registro?">
                        <i class="fa fa-trash"></i> </a>                        
                    @endcan
                </div>
            </td>
            @endif

        </tr>
        <tr>
            <td>12345678</td>
            <td>SUPREV</td>
            <td>Delano da Silva</td>
            <td>000.111.222-33</td>
            <td>00.111.222-00</td>
            <td>

                {!! " <span class='label label-sm ' style='background-color:#00bfff;'>Visita Domiciliar</span>" !!}
  
            </td>

            @if (Gate::check('edit__recad_suprev') || Gate::check('delete_recad_suprev'))
            <td>
                <div class="actions">
                    @can('edit_recad_suprev')
                    <a class="btn btn-sm green btn-outline tooltips" title="Editar" onclick="editar();">
                        <i class="fa fa-edit"></i> </a>                        
                    @endcan

                    @can('delete_recad_suprev')
                    <a class="btn btn-sm grey-salsa btn-outline tooltips" data-toggle="confirmation" data-funcao="excluir" data-id="{{ $reg->id }}" data-title="Deseja realmente excluir o registro?">
                        <i class="fa fa-trash"></i> </a>                        
                    @endcan
                </div>
            </td>
            @endif

        </tr>
        <tr>
            <td>12345678</td>
            <td>SUPREV</td>
            <td>Delano da Silva</td>
            <td>000.111.222-33</td>
            <td>00.111.222-00</td>
            <td>
                @if ($reg->ativo == 'S')
                {!! " <span class='label label-sm ' style='background-color:#30b319;'>Sim</span>" !!}
                @else
                 {!! " <span class='label label-sm ' style='background-color:#f54f4f;'>Não</span>" !!}
                @endif
            </td>

            @if (Gate::check('edit__recad_suprev') || Gate::check('delete_recad_suprev'))
            <td>
                <div class="actions">
                    @can('edit_recad_suprev')
                    <a class="btn btn-sm green btn-outline tooltips" title="Editar" onclick="editar();">
                        <i class="fa fa-edit"></i> </a>                        
                    @endcan

                    @can('delete_recad_suprev')
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