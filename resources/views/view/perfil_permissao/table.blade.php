<div cl ass="col-lg-12">
    <div class="portlet light portlet-fit bordered">
        <div class="portlet-body">
            <div class="mt-element-list">
                <div class="mt-list-head list-todo bg-blue">
                    <div class="list-head-title-container">
                        <h3 class="list-title" style="color: white">Lista de Permissões para {{ isset($perfil_acesso->id) ? $perfil_acesso->nome : '' }}</h3>
                    </div>
                </div>
                <div class="mt-list-container list-todo" id="accordion1" role="tablist" aria-multiselectable="true">
                    <div class="list-todo-line"></div>
                    <ul>
                        @php
                            $grupo = '';
                        @endphp
                        @foreach($registros as $reg)
                            @if ($grupo != $reg->p_grupo)
                                @if ($grupo != '')
                                    </ul>  
                                    </div>                               
                                    </div>
                                    </li>
                                @endif
                                <li class="mt-list-item">
                                    <div class="list-todo-item green-meadow">
                                    <a class="list-toggle-container" data-toggle="collapse" data-parent="#accordion1" onclick=" " href="#{{$reg->p_grupo}}" aria-expanded="false">
                                        <div class="list-toggle done uppercase">
                                            <div class="list-toggle-title bold">{!! str_replace('_', ' ', $reg->p_grupo) !!}</div>
                                            {{-- <div class="badge badge-default pull-right bold">{{isset($reg->p_grupo) ? $registros->count() : 0}}</div> --}}
                                        </div>
                                    </a>
                                    <div class="task-list panel-collapse collapse" id="{{$reg->p_grupo}}">
                                    <ul>
                            @endif
                                    <li class="task-list-item done">
                                        <div class="task-icon">
                                            <a href="javascript:;">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </div>

                                        @can('delete_perfil_permissao')
                                            <div class="task-status">
                                                <a class="btn btn-sm grey-salsa btn-outline tooltips" data-toggle="confirmation" data-funcao="excluir" data-id="{{ $reg->id }}" data-title="Deseja realmente excluir o registro?">
                                                        <i class="fa fa-trash" style="color: #333"></i> </a>
                                            </div>                                            
                                        @endcan

                                        <div class="task-content">
                                            <h4 class="uppercase bold">
                                                {{$reg->p_descricao}}
                                                @php
                                                   $grupo = $reg->p_grupo 
                                                @endphp
                                                {{-- {{ $grupo = $reg->p_grupo}} --}}
                                            </h4>
                                        </div>
                                    </li>                                    
                        @endforeach
                        @if ($grupo != '')
                            </ul>
                            </div>
                            </div>
                            </li>
                        @endif    
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="col-md-12">
    <div class="portlet light portlet-fit bordered">
        <div class="portlet-body">
            <div class="mt-element-list">

                <div class="mt-list-container list-simple ext-1 group">
                    <a class="list-toggle-container" data-toggle="collapse" href="#completed-simple" aria-expanded="false">
                        <div class="list-toggle uppercase" style="background-color: #3598dc;"> Lista de Permissões para {{ isset($perfil_acesso->id) ? $perfil_acesso->nome : '' }}
                            <span class="badge badge-default pull-right bg-white font-dark bold">{{isset($registros) ? $registros->count() : 0}}</span>
                        </div>
                    </a>
                    <div class="panel-collapse collapse in" id="completed-simple">
                        <ul>
                            @foreach($registros as $reg)
                            <li class="mt-list-item" style="border-color: #34495e #3598dc #e7ecf1;">
                                <div class="list-icon-container">
                                    <i class="icon-check"></i>
                                </div>
                                <div class="list-datetime">
                                    <a class="btn btn-sm grey-salsa btn-outline tooltips" data-toggle="confirmation" data-funcao="excluir" data-id="{{ $reg->id }}" data-title="Deseja realmente excluir o registro?">
                                        <i class="fa fa-trash"></i> </a>
                                </div>
                                <div class="list-item-content">
                                    <div class="uppercase">
                                        {{$reg->p_descricao}}
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div> --}}