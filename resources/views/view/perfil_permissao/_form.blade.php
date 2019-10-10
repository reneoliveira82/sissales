<input type="hidden" name="perfil_acesso_id" id="perfil_acesso_id" value="{{ isset($perfil_acesso->id) ? $perfil_acesso->id : '' }}">
<input type="hidden" name="codigo" id="codigo">
<div class="row form-body">

    <div class="row col-md-10">
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-12">
                <label class="control-label" for="perfil">Perfil:</label>
                    <input type="text" readonly class="form-control" name="perfil_nome" id="perfil_nome" value="{{ isset($perfil_acesso->id) ? $perfil_acesso->nome : '' }}">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-12">
                <label for="permissao_id" class="control-label">Permissão:</label>
                <div class="input-group select2-bootstrap-prepend">
                    <select multiple="multiple" class="multi-select" id="my_multi_select2" name="permissao_id[]">
                        @php
                            $grupo = ''
                        @endphp
                        @foreach($permissoes as $p)
                            @if ($grupo != $p->grupo)
                                @if ($grupo != '')
                                </optgroup>
                                @endif
                                <optgroup label="{{ str_replace('_', ' ', $p->grupo) }}">                            
                            @endif                        
                            <option value="{{ $p->id }}">{{ $p->descricao }}</option>
                            @php
                                $grupo = $p->grupo
                            @endphp
                        @endforeach
                        @if ($grupo != '')
                        </optgroup>
                        @endif                        
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6">
            <div class="form-group">
                <div class="col-md-12">
                <label for="permissao_id" class="control-label">Permissão:</label>
                <div class="input-group select2-bootstrap-prepend">
                    <select required class="form-control select2 " name="permissao_id" id="permissao_id">
                        <option value="">--Selecione--</option>

                        @foreach($permissoes as $p)
                        <option value="{{ $p->id }}">{{ $p->descricao }}</option>
                        @endforeach

                    </select>
                    <div class="help-block with-errors"></div>
                </div>
                </div>
            </div>
        </div> --}}
        
    </div>

    <div class="text-left">
        <div class="col-md-12">
            <div class="form-actions">
                @can('create_perfil_permissao')
                <button type="submit" class="btn blue" id="salvar" disabled><span class="fa fa-save"></span> Salvar</button>                    
                @endcan
                <button type="button" class="btn default" id="voltar"><span class="fa fa-undo"></span> Voltar</button>
            </div>
        </div>
    </div>

</div>