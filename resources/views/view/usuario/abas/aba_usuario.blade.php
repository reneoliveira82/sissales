<form role="form" id="form_usuario" method="post" data-toggle="validator" action="" class="form">
    @csrf
    <input type="hidden" name="_method" id="_method" value="">

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
                    <input type="text" class="form-control" name="matricula" id="matricula" onchange="consultaCampo(this.value, this.id, 'Matrícula já cadastrada');" maxlength="10" value="{{ isset($registros->matricula) ? $registros->matricula : '' }}" autocomplete="of">
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
        <div class="col-sm-6 ">
            <div class="form-group">
                <label for="funcao" class="control-label">Função</label>
                <input required type="text" class="form-control" name="funcao" id="funcao" value="{{ isset($registros->funcao) ? $registros->funcao : '' }}" autocomplete="of">
            </div>

        </div>

         
    </div>

    <div class="form-body">

        <div class="form-actions">
            <button type="submit" form="form_usuario" class="btn blue" id="salvar_usuario"><i class="fa fa-save"></i> Salvar</button>
            <button type="button" class="btn default" id="voltar"><i class="fa fa-undo"></i> Voltar</button>
            <button type="reset" class="btn default">Limpar</button>
        </div>
    </div>

</form>