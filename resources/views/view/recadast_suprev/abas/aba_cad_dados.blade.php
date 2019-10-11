<input type="hidden" name="codigo" id="codigo" value="">


<div class="row">
    <div class="col-sm-6 ">
        <div class="form-group">
            <label for="nome" class="control-label">Nome civil</label>
            <input required type="text" class="form-control" name="nome" id="nome" value="" maxlength="60" autocomplete="of">
            <!--<div class="help-block with-errors"></div>-->
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <label for="matricula" class="control-label">Matrícula</label>
            <input  required type="number" class="form-control" name="matricula" id="matricula" maxlength="70" autocomplete="of">
        </div>
    </div>

    <div class="col-sm-2 ">
        <div class="form-group">
            <label for="orgao" class="control-label">Órgão</label>
            <input required type="text" class="form-control" name="orgao" id="orgao" value="" maxlength="60" autocomplete="of">

        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="nomeMae" class="control-label">Nome da Mãe</label>
            <input required type="text" class="form-control" name="nomeMae" id="nomeMae" value="" maxlength="70" autocomplete="of">
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="nomePai" class="control-label">Nome do Pai</label>
            <input required type="text" class="form-control" name="nomePai" id="nomePai" value="" maxlength="70" autocomplete="of">
        </div>
    </div>
</div>

<div class="row">



    <div class="col-sm-3">
        <div class="form-group">
            <label for="data" class="control-label">Data</label>
            <input required type="date" class="form-control" name="data" id="data" maxlength="70" autocomplete="of">
        </div>
    </div>


    <div class="col-sm-3 ">
        <div class="form-group">
            <label for="local" class="control-label">Local de Nascimento</label>
            <input required type="text" class="form-control" name="local" id="local" value="" maxlength="60" autocomplete="of">
            <!--<div class="help-block with-errors"></div>-->
        </div>
    </div>



    <div class="col-sm-2">
        <div class="form-group">
            <label for="pais_dad">País</label>
            <select id="pais_dad" class="form-control" >
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group">
            <label for="estado_dad">Estado</label>
            <select id="estado_dad" class="form-control">
            <option value="">...</option>
                <option value="">...</option>
                <option value="">...</option>
                <option value="">...</option>
                <option value="">...</option>
                <option value="">...</option>
            </select>
        </div>
    </div>

    <div class="col-sm-2">
        <div class="form-group">
            <label for="nacionalidade">Nacionalidade</label>
            <select id="nacionalidade" class="form-control">
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                

            </select>

        </div>


    </div>



</div>

<div class="row">

    <div class="col-sm-2">
        <div class="form-group">
            <label for="sexo">Sexo</label>
            <select id="sexo" class="form-control">
                <option value="">Masculino</option>
                <option value="">Feminino</option>
                <option value="">Outros</option>
 
            </select>

        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <label for="estado_civil">Estado civil</label>
            <select  id ="estado_civil"class="form-control" >
                <option value="solteiro">Solteiro(a)</option>
                <option value="casado">Casado(a)</option>

                <option value="divorciado">Divorciado(a)</option>
                <option value="viúvo">Viúvo(a)</option>
                <option value="separado">Separado(a)</option>
                <option value="amasiado">Amasiado(a)</option>
            </select>
        </div>
    </div>

</div>

