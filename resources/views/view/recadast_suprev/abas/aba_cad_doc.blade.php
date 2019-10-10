<form id="form_doc_recadastrar"  method="POST" data-toggle="validator">
    @csrf
    


    <div class="row">
        <div class="col-sm-12" hidden>
            <div class="form-group">
               
                <input  type="text" class="form-control" name="id_servidor" id="id_servidor" value="{{isset($registros->servidor_id) ? $registros->servidor_id : '' }}" maxlength="15" autocomplete="of">
            </div>
         </div>
        <div class="col-sm-3 ">
            <div class="form-group">
                <label for="cpf" class="control-label">CPF</label>
            <input  type="txt" class="form-control "  name="cpf" id="cpf" value="{{isset($registros->cpf) ? $registros->cpf : '' }}" maxlength="14" autocomplete="of">
                <!--<div class="help-block with-errors"></div>-->
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="pis_pasep" class="control-label">Pis</label>
                <input  type="text" class="form-control" name="pis_pasep" id="pis_pasep" value="{{isset($registros->pis_pasep) ? $registros->pis_pasep : '' }}" maxlength="14" autocomplete="of">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="rg" class="control-label">Rg</label>
                <input  type="text" class="form-control" name="rg" id="rg" value="{{isset($registros->rg) ? $registros->rg : '' }}" maxlength="70" autocomplete="of">
            </div>
        </div>
        <div class="col-sm-1 ">
            <div class="form-group">
                <label for="org_exp_rg" class="control-label">Órgão Exp.</label>
                <input  type="text" class="form-control" name="org_exp_rg" id="org_exp_rg" value="{{isset($registros->org_exp_rg) ? $registros->org_exp_rg : '' }}" maxlength="6" autocomplete="of">          
            </div>
        </div> 
      
        <div class="col-md-3">
                <div class="form-group">
                    <label for="dt_exp_rg"class="">Data.Emissão</label>

                    <div class="input-group date date-picker">

                            <input  type="text" class="form-control" name="dt_exp_rg" id="dt_exp_rg" maxlength="70" autocomplete="of" value="{{isset($registros->dt_exp_rg) ? date('d/m/Y', strtotime($registros->dt_exp_rg)) : '' }}">
                        <span class="input-group-btn">
                            <button class="btn default date-set" type="button">
                                <i class="fa fa-calendar"></i>
                            </button>
                        </span>
                    </div>
                </div><!-- FIM DO FORMGROUP -->
            </div><!-- Fim do Col -->

        <div class="col-sm-1 ">
            <div class="form-group">
                <label for="uf" class="control-label">UF</label>
                <input  type="text" class="form-control" name="uf" id="uf" value="{{isset($registros->uf) ? $registros->uf : '' }}" maxlength="2" autocomplete="of">
            
            </div>
        </div>   
    </div>
    <div class="row">
        <div class="col-sm-3">
                <div class="form-group">
                    <label for="tit_eleitor" class="control-label">Título de Eleitor</label>
                    <input  type="text" class="form-control" name="tit_eleitor" id="tit_eleitor" value="{{isset($registros->tit_eleitor) ? $registros->tit_eleitor : '' }}" maxlength="60" autocomplete="of">
                    <!--<div class="help-block with-errors"></div>-->
                </div>
            </div>
            <div class="col-sm-1">
                <div class="form-group">
                    <label for="zona" class="control-label">Zona</label>
                    <input  type="text" class="form-control" name="zona" id="zona" value="{{isset($registros->zona) ? $registros->zona : '' }}" maxlength="10" autocomplete="of">
                
                </div>
            </div> 
            <div class="col-sm-1 ">
                <div class="form-group">
                    <label for="secao" class="control-label">Seção</label>
                    <input  type="text" class="form-control" name="secao" id="secao" value="{{isset($registros->secao) ? $registros->secao : '' }}" maxlength="10" autocomplete="of">
                
                </div>
            </div> 
            <div class="col-sm-1 ">
                <div class="form-group">
                    <label for="uf_exp_tit" class="control-label">UF</label>
                    <input  type="text" class="form-control" name="uf_exp_tit" id="uf_exp_tit"  value="{{isset($registros->uf_exp_tit) ? $registros->uf_exp_tit : '' }}" maxlength="2" autocomplete="of">
                
                </div>
            </div> 
          
            <div class="col-md-3">
                <div class="form-group">
                    <label for="dt_exp_tit"class="">Data.Emissão</label>

                    <div class="input-group date date-picker">

                            <input  type="text" class="form-control" name="dt_exp_tit" id="dt_exp_tit" maxlength="70" autocomplete="of" value="{{isset($registros->dt_exp_tit) ? date('d/m/Y', strtotime($registros->dt_exp_tit)) : '' }}">
                        <span class="input-group-btn">
                            <button class="btn default date-set" type="button">
                                <i class="fa fa-calendar"></i>
                            </button>
                        </span>
                    </div>
                </div><!-- FIM DO FORMGROUP -->
            </div><!-- Fim do Col -->


        </div>
        <div class="row">
                <div class="col-sm-3">
                <div class="form-group">
                    
                        <label for="num_cnh" class="control-label">N° CNH</label>
                <input  type="text" class="form-control" name="num_cnh" id="num_cnh" maxlength="11" autocomplete="of" value="{{isset($registros->num_cnh) ? $registros->num_cnh : "" }}">
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                    <label for="dt_val_cnh"class="">Data de validade:</label>

                    <div class="input-group date date-picker">

                        <input  autocomplete="off" type="text" class="form-control mask_date2" name="dt_val_cnh" id="dt_val_cnh" value="{{isset($registros->dt_val_cnh) ? date('d/m/Y', strtotime($registros->dt_val_cnh)) : "" }}" >
                        <span class="input-group-btn">
                            <button class="btn default date-set" type="button">
                                <i class="fa fa-calendar"></i>
                            </button>
                        </span>
                    </div>
                </div><!-- FIM DO FORMGROUP -->
            </div><!-- Fim do Col -->
        </div>
        @if($registros->id_status == 3 || $registros->desc_status == 'Visita Domiciliar')
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                        <label for="sei" class="control-label">SEI</label>
                        <input  type="text" class="form-control" name="sei" id="sei" maxlength="11" autocomplete="of" value="{{isset($registros->sei) ? $registros->sei : "" }}">
                </div>
            </div>
        </div>
        @endif
</form>
<div class="form-actions">
    <button type="submit" form="form_doc_recadastrar" class="btn blue" id="btn_doc_recadastrar"><span class="fa fa-save"></span> Recadastrar </button>
    <button type="button" class="btn default" id="voltar_doc"><span class="fa fa-undo"></span> Voltar</button>

</div>



