<input type="hidden" name="codigo" id="codigo" value="">


<div class="row">
    <div class="col-sm-5 ">
        <div class="form-group">
            <label for="situacao" class="control-label">Situacao</label>
            <input required type="text" class="form-control" name="situacao" id="situacao" value="" maxlength="60" autocomplete="of">
            <!--<div class="help-block with-errors"></div>-->
        </div>
    </div>


    <div class="col-sm-3">
        <div class="form-group">
            <label for="data_inicio" class="control-label">Data Inicio</label>
            <input required type="date" class="form-control" name="data_inicio" id="data_inicio" maxlength="70" autocomplete="of">
        </div>
    </div>


    
    <div class="col-sm-3">
        <div class="form-group">
            <label for="data_fim" class="control-label">Data Fim</label>
            <input required type="date" class="form-control" name="data_fim" id="data_fim" maxlength="70" autocomplete="of">
        </div>
    </div>

</div>

<div class="row">
    <div class="form-group">
        <div class="col-sm-6">
            <label for="observacao">Observação</label>
            <textarea id="observacao" name="observacao" class="form-control" maxlength="200" rows="4" placeholder="Tamanho máximo de 200 caracteres"></textarea>
        </div>
    </div>
</div>


