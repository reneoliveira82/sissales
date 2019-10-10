<div class="row">
    <div class="col-md-12 ">
        <div class="portlet light bordered" style="background-color: #e9ecf3">
            <div class="portlet-body">
                <form action="" class="form-horizontal" method="POST" data-toggle="validator" id="form_perfil_usuario">                    
                @csrf

                    <div class="row form-body">

                        <input type="hidden" name="user_id" id="user_id" value="{{ isset($registros->id) ? $registros->id : ''}}">

                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class=" col-md-12">
                                        <label class="control-label">Perfil de Acesso:</label>
                                    </div>
                                    <div class="col-md-12">
                                        <select required class="form-control select2 valida" name="perfil_acesso_id" id="perfil_acesso_id">
                                            <option value="">--Selecione--</option>
                                            @foreach ($perfil_acesso as $pa)
                                            <option value="{{ $pa->id }}" >{{ $pa->nome }}</option>
                                            @endforeach

                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="dadosPerfilAcesso"></div>

                        <div class="text-left">
                            <div class="col-md-12">
                                <div class="form-actions">
                                    <button type="submit" form="form_perfil_usuario" class="btn blue" id="salvar_perfil_usuario"><span class="fa fa-plus"></span> Adicionar</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div><!-- FIM DO COL -->
</div><!-- FIM DO ROW-->

<div class="row">

    <div class="col-md-12">
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-body">
                <div class="mt-element-list">

                    <div class="mt-list-container list-simple ext-1 group">
                        <a class="list-toggle-container" data-toggle="collapse" href="#servico_legislacao" aria-expanded="false">
                            <div class="list-toggle uppercase" style="background-color: #3598dc;"> Lista de Legislações do Serviço
                                <span class="badge badge-default pull-right bg-white font-dark bold">{{isset($servico_categoria) ?$servico_legislacao->count() : ''}}</span>
                            </div>
                        </a>
                        <div class="panel-collapse collapse in" id="servico_legislacao">
                            <ul>
                            @if (isset($perfil_user))
                            @foreach($perfil_user as $pu)
                                <li class="mt-list-item" style="border-color: #34495e #3598dc #e7ecf1;">
                                    <div class="list-icon-container">
                                        <i class="icon-check"></i>
                                    </div>
                                    <div class="list-datetime">
                                        <a class="btn btn-sm grey-salsa btn-outline tooltips" data-toggle="confirmation" data-funcao="excluir" data-id_acao="excluirPerfil" data-id="{{ $pu->pu_id }}" data-aba="perfil_user" data-title="Deseja realmente excluir o registro?">
                                            <i class="fa fa-trash"></i> </a>
                                    </div>
                                    <div class="list-item-content">
                                        <div class="uppercase">
                                        {{$pu->nome}}
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>