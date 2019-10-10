<input type="hidden" name="codigo" id="codigo" value="{{ isset($registros->id) ? $registros->id : '' }}">

<div class="row">
    <div class="col-sm-6 ">
        <div class="form-group">
            <label for="nome" class="control-label">Nome:</label>
            <input required type="text" class="form-control" name="name" id="name" value="{{ isset($registros->name) ? $registros->name : '' }}" maxlength="100" autocomplete="of">
            <!--<div class="help-block with-errors"></div>-->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2 ">
        <div class="form-group">
            <label for="cpf" class="control-label">CPF</label>
            <div id="load_cpf">
                <input required type="text" class="form-control" name="cpf" id="cpf" onchange="consultaCampo(this.value, this.id, 'CPF já cadastrado');" maxlength="14" value="{{ isset($registros->cpf) ? $registros->cpf    : '' }}" autocomplete="of"> <!--data-mask="999.999.999-99"-->
                <div style="color: #e73d4a;" id="msg_valida_cpf"></div>
                <div style="color: #e73d4a;" id="msg_error"></div>
            </div>
        </div>
    </div>

    <div class="col-sm-2 ">
        <div class="form-group">
            <label for="matricula" class="control-label">Matrícula</label>
            <div id="load_matricula">
                <input required type="text" class="form-control" name="matricula" id="matricula" onchange="consultaCampo(this.value, this.id, 'Matrícula já cadastrada');" maxlength="10" value="{{ isset($registros->matricula) ? $registros->matricula : '' }}" autocomplete="of">
                <div style="color: #e73d4a;" id="msg_valida_matricula"></div>
            </div>
        </div>
    </div>
    
    <div class="col-sm-2 ">
        <div class="form-group">
            <label for="telefone" class="control-label">Telefone</label>
            <input required type="text" class="form-control" name="telefone" id="telefone" maxlength="15" value="{{ isset($registros->telefone) ? $registros->telefone : '' }}" autocomplete="of">
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-5 ">
        <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <div id="load_email">
                <input required type="email" class="form-control" name="email" id="email" onchange="consultaCampo(this.value, this.id, 'Este endereço de email já está em uso. Tente outro.');" value="{{ isset($registros->email) ? $registros->email : '' }}" data-error="Por favor, insira um endereço de e-mail válido.">
                <div style="color: #e73d4a;" id="msg_valida_email"></div>
            </div>
            <div class="help-block with-errors"></div>
        </div>
    </div>

    <div class="col-sm-1 ">
        <div class="form-group">
            <label for="ativo">Ativo</label>
            <div class="mt-checkbox-list">
                <label class="mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" value="S" name="ativo" id="modelo_1" {{ isset($registros->ativo) && $registros->ativo == 'S' ? 'checked' : '' }} />
                    <span></span>
                </label>
            </div>
        </div>
    </div>
    
</div>


<div class="row">
    <div class="col-sm-3 ">
        <div class="form-group">
            <label for="funcao" class="control-label">Função</label>
            <input required type="text" class="form-control" name="funcao" id="funcao" value="{{ isset($registros->funcao) ? $registros->funcao : '' }}" autocomplete="of">
        </div>

    </div>

    <div class="col-sm-3 ">
        <div class="form-group" class="control-label">
            <label for="vinculo_empregaticio" class="control-label">Vínculo Empregatício</label>
            <div class="input-group select2-bootstrap-prepend">

                <select required class="form-control select2" name="id_vinculo_empregaticio" id="id_vinculo_empregaticio">                                                                
                    <option value="">--Selecione--</option>
                    <option value="">--Selecione--</option>
                    @foreach($vinculo_empregaticio as $ve)
                    <option value="{{ $ve->id }}" {{ (isset($registros->id_vinculo_empregaticio) && $registros->id_vinculo_empregaticio == $ve->id) ? 'selected' : '' }}>{{ $ve->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>    
</div>


<div class="row">
    <div class="col-sm-3 ">
        <div class="form-group">
            <label for="orgao" class="control-label">Órgão</label>
            <div class="input-group select2-bootstrap-prepend">

                <select required class="form-control select2" name="id_orgao" id="id_orgao">                                                                
                    <option value="">--Selecione--</option>
                    @foreach($orgaos as $o)
                    <option value="{{ $o->id }}" {{ (isset($registros->id_orgao) && $registros->id_orgao == $ve->id) ? 'selected' : '' }}>{{ $o->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>

    <div class="col-sm-3 ">
        <div class="form-group">
            <label for="perfil_acesso" class="control-label">Perfil de Acesso</label>
            <div class="input-group select2-bootstrap-prepend">

                <select required class="form-control select2" name="id_perfil_acesso" id="id_perfil_acesso">                                                                
                    <option value="">--Selecione--</option>
                    <option value="1" {{ isset($registros->id_perfil_acesso) ? 'selected' : '' }}>Visualizador</option>
                </select>
            </div>
        </div>
    </div>    
</div>