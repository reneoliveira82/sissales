<input type="hidden" name="codigo" id="codigo" value="">


<div class="row">
    <div class="col-sm-6 ">
        <div class="form-group">
            <label for="tEleior" class="control-label">Nº Titulo Eleitor:</label>
            <input required type="number" class="form-control" name="tEleior" id="tEleior" value="" maxlength="60" autocomplete="of">
            <!--<div class="help-block with-errors"></div>-->
        </div>
    </div>

    <div class="col-sm-6 ">
        <div class="form-group">
            <label for="orgao" class="control-label">Em Desenvolvimento:</label>
            <input required type="text" class="form-control" name="orgao" id="orgao" value="" maxlength="60" autocomplete="of">
            <!--<div class="help-block with-errors"></div>-->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="rg" class="control-label">Em Desenvolvimento:</label>
            <input required type="number" class="form-control" name="rg" id="rg" value="" maxlength="70" autocomplete="of">
       </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="cpf" class="control-label">Em Desenvolvimento:</label>
            <input required type="number" class="form-control" name="cpf" id="cpf" value="" maxlength="70" autocomplete="of">
      </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="mae" class="control-label">Em Desenvolvimento:</label>
            <input required type="text" class="form-control" name="nomeMae" id="nomeMae" value="" maxlength="70" autocomplete="of">
       </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="pai" class="control-label">Em Desenvolvimento:</label>
            <input required type="text" class="form-control" name="nomePai" id="nomePai" value="" maxlength="70" autocomplete="of">
      </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="endereco" class="control-label">Em Desenvolvimento:</label>
            <div id="load_matricula">
                <input placeholder="Ex: Rua, Av." required type="text" class="form-control" name="endereco" id="endereco" value="" maxlength="100" autocomplete="of">
            </div>
        </div>
    </div>
    
</div>


<div class="row">
    <div class="col-sm-2 ">
        <div class="form-group">
            <label for="cep" class="control-label">Em Desenvolvimento:</label>
            <div id="load_cpf">
                <input required type="text" class="form-control" name="cep" id="cep" maxlength="10" value="" autocomplete="off">
            </div>
        </div>
    </div>

    <div class="col-sm-3 ">
        <div class="form-group">
            <label for="municipio" class="control-label">Em Desenvolvimento:</label>
            <div id="load_email">
                <input required type="text" class="form-control" name="municipio" id="municipio" value="" maxlength="60" autocomplete="of">
            </div>
        </div>
    </div>

    <div class="col-sm-1 ">
        <div class="form-group">
            <label for="ativo">Ativo:</label>
            <div class="mt-checkbox-list">
                <label class="mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" value="S" name="ativo"/>
                    <span></span>
                </label>
            </div>
        </div>
    </div>

</div>


<div class="row">
    <div class="form-group">
        <div class="col-sm-6">
            <label for="observacao">Observação:</label>
            <textarea id="observacao" name="observacao" class="form-control" maxlength="200" rows="4" placeholder="Tamanho máximo de 200 caracteres"></textarea>
        </div>
    </div>
</div>
