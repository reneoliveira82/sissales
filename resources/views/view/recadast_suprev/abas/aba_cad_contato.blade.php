<form id="form_contato_recadastrar"  method="POST" data-toggle="validator">
@csrf



<div class="row">

 <div class="col-sm-12" hidden>
    <div class="form-group">
        <input  type="text" class="form-control" name="id_contato" id="id_contato" value="{{isset($registros->contato_id) ? $registros->contato_id : '' }}" maxlength="15" autocomplete="of">
        <input  type="text" class="form-control" name="id_servidor" id="id_servidor" value="{{isset($registros->servidor_id) ? $registros->servidor_id : '' }}" maxlength="15" autocomplete="of">

    </div>
</div>

 <div class="col-sm-1">
    <div class="form-group">
        <label for="ddd1" class="control-label">DDD</label>
        <input  type="text" class="form-control" name="ddd1" id="ddd1" value="{{isset($registros->ddd1) ? $registros->ddd1 : '' }}" maxlength="15" autocomplete="of">

    </div>
</div>

<div class="col-sm-3">
    <div class="form-group">
        <label for="tel_resid_1" class="control-label">Celular</label>
        <input  type="text" class="form-control" name="tel_resid_1" id="tel_resid_1" value="{{isset($registros->tel_resid_1) ? $registros->tel_resid_1 : '' }}" maxlength="15" autocomplete="of">
        <!--<div class="help-block with-errors"></div>-->
    </div>
</div>

<div class="col-sm-1">
    <div class="form-group">
        <label for="ddd2" class="control-label">DDD</label>
        <input  type="text" class="form-control" name="ddd2" id="ddd2" value="{{isset($registros->ddd2) ? $registros->ddd2 : '' }}" maxlength="15" autocomplete="of">
        
    </div>
</div>


<div class="col-sm-3">
    <div class="form-group">
        <label for="tel_resid_2" class="control-label">Celular</label>
        <input  type="text" class="form-control" name="tel_resid_2" id="telefone_2" value="{{isset($registros->tel_resid_2) ? $registros->tel_resid_2 : '' }}" maxlength="15" autocomplete="of">
        <!--<div class="help-block with-errors"></div>-->
    </div>
</div>




</div>

<div class="row">

    <div class="col-sm-1">
        <div class="form-group">
            <label for="ddd_cel" class="control-label">DDD</label>
            <input  type="text" class="form-control" name="ddd_cel" id="ddd_cel" value="{{isset($registros->ddd_cel) ? $registros->ddd_cel : '' }}" maxlength="15" autocomplete="of">

        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <label for="celular" class="control-label">Telefone</label>
            <input  type="text" class="form-control" name="celular" id="celular" value="{{isset($registros->celular) ? $registros->celular : '' }}" maxlength="15" autocomplete="of">
            <!--<div class="help-block with-errors"></div>-->
        </div>
    </div>

    <div class="col-sm-4 ">
        <div class="form-group">
            <label for="email" class="control-label">E-mail</label>
            <input  type="email" class="form-control" name="email" id="email" value="{{isset($registros->email) ? $registros->email : '' }}" maxlength="60" autocomplete="of">

        </div>
      
        
    </div>
    </div>

</form>
<div class="form-actions">
    <button type="submit" form="form_contato_recadastrar" class="btn blue" id="btn_contato_recadastrar"><span class="fa fa-save"></span> Recadastrar </button>
    <button type="button" class="btn default" id="voltar_con"><span class="fa fa-undo"></span> Voltar</button>
  
</div>



