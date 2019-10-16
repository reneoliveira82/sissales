

    <!-- Essa aba sera a segunda para  -->
    <form id="form_endereco_recadastrar"  method="POST" data-toggle="validator" >
        @csrf
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="cep" class="control-label">Cep</label>
                <input  type="text" class="form-control" name="cep" id="cep" value="{{isset($registros->cep) ? $registros->cep : '' }}" maxlength="10" autocomplete="of">
                    <!--<div class="help-block with-errors"></div>-->
                </div>
            </div>
            <div class="col-sm-2">
               
                <div class="input-group select2-bootstrap-prepend">
                    <label for="id_tipo_lograd"> Tipo de Logradouro </label>
                    <select id="id_tipo_lograd" name="id_tipo_lograd"   class="form-control select2"  > 
                        <option  value=""> --Selecione--</option>
                        @foreach ($tipo_logradouro as $tlrows)
                        <option value="{{$tlrows->id}}" {{ isset($registros->id_tipo_lograd) && $tlrows->id == $registros->id_tipo_lograd ? 'selected' : ''}}>{{$tlrows->descricao_tipo_lograd}}</option>
                        @endforeach
                      
                    </select>
                </div><!-- FIM DO FORMGROUP -->
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="logradouro" class="control-label"> Logradouro  </label>
                <input  type="text" class="form-control" name="logradouro" id="logradouro" value="{{isset($registros->logradouro) ? $registros->logradouro : '' }}" maxlength="60" autocomplete="of">           
                </div>
            </div> 
            <div class="col-sm-1 ">
                <div class="form-group">
                    <label for="numero" class="control-label">Nº</label>
                <input  type="text" class="form-control" name="numero" id="numero" value="{{isset($registros->numero) ? $registros->numero : '' }}" maxlength="6" autocomplete="of">      
                </div>
            </div> 
            <div class="col-sm-3 ">
                <div class="form-group">
                    <label for="bairro" class="control-label">Bairro</label>
                <input  type="text" class="form-control" name="bairro" id="bairro" value="{{isset($registros->bairro) ? $registros->bairro : '' }}" maxlength="60" autocomplete="of">
                </div>
            </div> 
        </div> 
        <div class="row">
            <div class="col-sm-3 ">
         
                <div class="input-group select2-bootstrap-prepend">
                 
                    <label for="id_pais"> Estado </label>
                    <select id="id_pais" name="id_pais"   class="form-control select2"  > 
                        <option  value=""> --Selecione--</option>
                        @foreach($pais_origem as $poRows) 
                        @foreach ($endereco as $ec)                            
                        
                        <option value="{{$poRows->id}}" {{$poRows->id == $ec->id_pais ? 'selected' : ''}} >{{$poRows->descricao_pais_origem }}</option>
                        @endforeach
                        @endforeach
                      
                    </select>
                </div><!-- FIM DO FORMGROUP -->
            </div> 
            <div class="col-sm-1">
               
                <div class="form-group">
                    <label for="uf_endereco"> UF</label>
                  
                    <input  type="text" class="form-control" name="uf_endereco" id="uf_endereco" value="{{isset($registros->uf_endereco) ? $registros->uf_endereco : '' }}" maxlength="2" autocomplete="of">
                </div><!-- FIM DO FORMGROUP -->
            </div>
            </div>
            <div class="row">
            <div class="col-sm-6 ">
                <div class="form-group">
                    <label for="compl_logradouro" class="control-label">Complemento de Endereço</label>
                    <div id="compl_logradouro">
                        <input  type="text" class="form-control" name="compl_logradouro" id="compl_logradouro" value="{{isset($registros->compl_logradouro) ? $registros->compl_logradouro : '' }}" maxlength="60" autocomplete="of">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="form-actions">
        <button type="submit" form="form_endereco_recadastrar" class="btn blue" id="btn_endereco_recadastrar"><span class="fa fa-save"></span> Recadastrar </button>
        <button type="button" class="btn default" id="voltar_end"><span class="fa fa-undo"></span> Voltar</button>
      
    </div>
    







