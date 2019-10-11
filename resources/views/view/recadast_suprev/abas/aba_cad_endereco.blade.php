<input type="hidden" name="codigo" id="codigo" value="">

<!-- Essa aba sera a segunda para  -->
<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            <label for="cep" class="control-label">Cep</label>
            <input required type="number" class="form-control" name="cep" id="cep" value="" maxlength="60" autocomplete="of">
            <!--<div class="help-block with-errors"></div>-->
        </div>
    </div>

     <div class="col-sm-3">
        <div class="form-group">
            <label for="logradouro" class="control-label">Logradouro</label>
            <input required type="text" class="form-control" name="logradouro" id="logradouro" value="" maxlength="60" autocomplete="of">
           
        </div>
    </div> 

    <div class="col-sm-1 ">
        <div class="form-group">
            <label for="numero" class="control-label">Nº</label>
            <input required type="text" class="form-control" name="numero" id="numero" value="" maxlength="6" autocomplete="of">
           
        </div>
    </div> 

    <div class="col-sm-3 ">
        <div class="form-group">
            <label for="bairro" class="control-label">Bairro</label>
            <input required type="text" class="form-control" name="bairro" id="bairro" value="" maxlength="60" autocomplete="of">
           
        </div>
    </div> 


</div>


<div class="row">
       <div class="col-sm-3 ">
        <div class="form-group">
            <label for="pais_end" class="control-label">País</label>
            <input required type="text" class="form-control" name="pais_end" id="pais_end" value="" maxlength="60" autocomplete="of">
           
        </div>
    </div> 

    <div class="col-sm-2">
        <div class="form-group">
            <label for="estado_end">Estado</label>
            <select id="estado_end" class="form-control">
            <option value="">...</option>
                <option value="">...</option>
                <option value="">...</option>
                <option value="">...</option>
                <option value="">...</option>
                <option value="">...</option>
            </select>
        </div>
    </div>

    <div class="col-sm-3 ">
        <div class="form-group">
            <label for="municipio" class="control-label">Municipio</label>
            <div id="load_email">
                <input required type="text" class="form-control" name="municipio" id="municipio" value="" maxlength="60" autocomplete="of">
            </div>
        </div>
    </div>


    <div class="col-sm-6 ">
        <div class="form-group">
            <label for="comple_end" class="control-label">Complemento de End.</label>
            <div id="comple_end">
                <input required type="text" class="form-control" name="comple_end" id="comple_end" value="" maxlength="60" autocomplete="of">
            </div>
        </div>
    </div>


</div>





