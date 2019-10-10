
<form id="form_dados_pessoais"  method="POST" data-toggle="validator">
   @csrf
    <!-- <input type="hidden" name="codigo" id="codigo" value="{{ isset($registros->id) ? $registros->id : '' }}"> -->
   

    <div class="row">

    <div class="col-sm-12" hidden>
            <div class="form-group">
                
                <input  type="text" class="form-control" name="id_servidor" id="id_servidor" value="{{isset($registros->servidor_id) ? $registros->servidor_id : '' }}" maxlength="15" autocomplete="of">

            </div>
        </div>

        <div class="col-sm-4 ">
            <div class="form-group">
                <label for="nome" class="control-label">Nome civil</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{isset($registros->nome) ? $registros->nome : '' }}" maxlength="60" autocomplete="of">
                <!--<div class="help-block with-errors"></div>-->
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label for="matricula" class="control-label">Matrícula</label>
                <input   type="text" class="form-control" name="matricula" id="matricula"value="{{isset($registros->matricula) ? $registros->matricula : '' }}" maxlength="70" autocomplete="of">
            </div>
        </div>

        <div class="col-sm-3 ">
            <div class="form-group">
                <label for="orgao" class="control-label">Órgão</label>
                <input  type="text" class="form-control" name="orgao" id="orgao" value="{{isset($registros->orgao) ? $registros->orgao : '' }}" maxlength="30" autocomplete="of">

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="nome_mae" class="control-label">Nome da Mãe</label>
                <input  type="text" class="form-control" name="nome_mae" id="nome_mae" value="{{isset($registros->nome_mae) ? $registros->nome_mae : '' }}" maxlength="70" autocomplete="of">
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="nome_pai" class="control-label">Nome do Pai</label>
                <input  type="text" class="form-control" name="nome_pai" id="nome_pai" value="{{isset($registros->nome_pai) ? $registros->nome_pai : '' }}" maxlength="70" autocomplete="of">
            </div>
        </div>
    </div>

    <div class="row">
     
        <div class="col-md-3">
                <div class="form-group">
                    <label for="dt_nasc"class="">Data de validade:</label>
                    <div class="input-group date date-picker">
                            <input  type="text" class="form-control mask_date2" name="dt_nasc" id="dt_nasc" maxlength="70" value="{{isset($registros->dt_nasc) ? date('d/m/Y', strtotime($registros->dt_nasc)) : '' }}" autocomplete="of">
                        <span class="input-group-btn">
                            <button class="btn default date-set" type="button">
                                <i class="fa fa-calendar"></i>
                            </button>
                        </span>
                    </div>
                </div><!-- FIM DO FORMGROUP -->
            </div><!-- Fim do Col -->
        <div class="col-sm-3 ">
            <div class="form-group">
                <label for="mun_origem" class="control-label">Município de Nasc.</label>
                <input  type="text" class="form-control" name="mun_origem" id="mun_origem" value="{{isset($registros->mun_origem) ? $registros->mun_origem : '' }}" maxlength="60" autocomplete="of">
                <!--<div class="help-block with-errors"></div>-->
            </div>
        </div>
    
        <div class="col-sm-1">
            <div class="form-group">
                <label for="uf_nat" class="control-label">Estado</label>
                <input  type="text" class="form-control" name="uf_nat" id="uf_nat" value="{{isset($registros->uf_nat) ? $registros->uf_nat : '' }}" maxlength="2" autocomplete="of">
                <!--<div class="help-block with-errors"></div>-->
            </div>
        </div>

        <div class="col-sm-2">       
            <div class="input-group select2-bootstrap-prepend">
                <label for="pais_orig"> País</label>
                <select id="pais_orig" name="pais_orig"  class="form-control select2"  >             
                    <option  value=""> --Selecione--</option>
                   
                    @foreach ($pais_origem as $rows_pais_origem)
                        
                              
                <option type="text" class="form-control" {{isset($registros->pais_orig) && $rows_pais_origem->id == $registros->pais_orig  ? 'selected' : '' }} value="{{$rows_pais_origem->id}}"> {{$rows_pais_origem->descricao_pais_origem}}</option>
                    @endforeach                
                </select>
            </div><!-- FIM DO FORMGROUP -->   
        </div>  

        <div class="col-sm-3">
     
              <div class="input-group select2-bootstrap-prepend">
                <label for="id_nacion">Nacionalidade </label>
                <select id="id_nacion" name="id_nacion"  class="form-control select2"  > 
                    <option  value=""> --Selecione--</option>
                    @foreach ($nacionalidade as $nc)
                    <option type="text" class="form-control"  value="{{$nc->id}}" {{ isset($registros->nc_id) && $nc->id == $registros->nc_id ? 'selected' : ''}}>{{$nc->descricao_nacion}}</option>
                    @endforeach
                  
                </select>
            </div><!-- FIM DO FORMGROUP -->


        </div> 
    </div>

    <div class="row">
    <div class="col-sm-1">
            <div class="form-group">
                <label for="sexo" class="control-label">Sexo</label>
                <input  type="text" class="form-control" name="sexo" id="sexo" value="{{isset($registros->sexo) ? $registros->sexo : '' }}" maxlength="01" autocomplete="of">
                <!--<div class="help-block with-errors"></div>-->
            </div>


            </div>
    

        <div class="col-sm-3">       
            <div class="input-group select2-bootstrap-prepend">
                <label for="id_est_civil"> Estado civil</label>
                <select id="id_est_civil" name="id_est_civil"  class="form-control select2"  > 
                    <option  value=""> --Selecione--</option>
                    @foreach ($estado_civil as $ec)
                    <option type="text" class="form-control"  value="{{$ec->id}}" {{ isset($registros->ec_id) && $ec->id == $registros->ec_id ? 'selected' : ''}}>{{$ec->descricao_est_civil}}</option>
                    @endforeach
                  
                </select>
            </div><!-- FIM DO FORMGROUP -->


        </div>
       
        <div class="col-sm-3">       
                <div class="input-group select2-bootstrap-prepend">
                    <label for="id_status"> Situação de Recadastramento</label>
                    <select id="id_status" name="id_status"  class="form-control select2"  >             
                        <option  value=""> --Selecione--</option>
                        @foreach ($status as $rows_status)
                        <option type="text" class="form-control"  value="{{$rows_status->id}}" {{ isset($registros->id_status) && $rows_status->id == $registros->id_status ? 'selected' : ''}}>{{$rows_status->desc_status}}</option>
                        @endforeach                      
                    </select>
                </div><!-- FIM DO FORMGROUP -->   
            </div>        


     
      
    </div>
    <div class="row">
            <div class="form-group">                                                      
                    <div class="col-md-4">
                    <label class="control-label">Adicionar arquivos:</label>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <input type="file" name="ARQUIVO[]" id="ARQUIVO" multiple> </span>
                           
                       
                        </div><!--END FILEINPUT FILEINPUT-NEW-->
        
                    </div><!--END COL-MD-->   
                    <div class="form-group">
                        <div class="csm-4">
                        <input type="hidden" name="cert_obito" id="cert_obito" value="">            
                        </div>
                    </div>                        
                                     
                                             
                </div><!-- FIM DO FORMGROUP -->
                
                <div class="form-group ">
                        <div class="csm-2">
                                <input type="button" class="btn blue"  id="submit-btn" value="Adicionar Certidão" />
                
                        </div>
                        </div>
           
                <div class="form-group">  
                <div class="col-sm-4">                    
                   <p> <a  style="text-decoration: underline" href="#"> Download Certidão de Óbito </a></p>                              
                </div>               
                </div>                
    </div>
   
    <br>


</form>


<div class="form-actions">
    <button type="submit" form="form_dados_pessoais" class="btn blue" id="btn_dados_recadastrar"><span class="fa fa-save"></span> Recadastrar </button>
    <button type="button" class="btn default" id="voltar"><span class="fa fa-undo"></span> Voltar</button>
    
</div>


