<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Permissões</h4>
            </div>
            <div class="modal-body">

                <div class="row" hidden="">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="codigo">Código</label>
                            <input type="text" readonly class="form-control" name="codigo" id="codigo">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <label for="nome" class="control-label">Nome</label>
                            <input required type="text" class="form-control" name="nome" id="nome" maxlength="65" autocomplete="off">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10 ">
                        <div class="form-group">
                            <label for="prazo_estimado" class="control-label">Descrição </label>
                            <textarea required id="descricao" name="descricao" class="form-control" maxlength="200" rows="3" ></textarea>
                           </div>
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-xs-2">

                        <div class="mt-checkbox-outline">
                            <label for="ativo"> Ativo </label>
                            <label class="mt-checkbox mt-checkbox-outline">
                                <input type="checkbox" onchange="" value="S" name="ativo" id="ativo"> <span></span> </label>
                        </div>
                    </div>
                </div> --}}


                <div class="row text-right">
                    <div class="col-md-12">
                        <div class="form-actions">
                            <button type="submit" class="btn blue" id="salvar">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->