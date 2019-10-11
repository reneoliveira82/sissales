@extends('layout.default')

@section('titulo', 'Recadastramento | Sistema Gestão de Recadastramento')

@section('conteudo')

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-head">
            <div class="page-title">
                <h1>Recadastramento</h1>
            </div>

        </div>

        @if (session('msg')) {!! session('msg') !!} @endif


        <div class="row">
            <div class="col-md-12 ">

                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-green">
                            <i class="icon-settings font-green"></i>
                            <span class="caption-subject bold uppercase">Recadastramento</span>

                        </div>
                    </div>

                    <div class="portlet-body form">

                        {{-- <form role="form" id="form_recad_suprev" method="post" data-toggle="validator" action="">
                            @csrf
                            <input type="hidden" name="_method" id="_method" value="">

                            @include('view.recadast_suprev._form')
                            <div class="form-body">
                            </div>
                        </form> --}}

                        <div class="tabbable tabbable-tabdrop">
                            <!-- Aqui definimos as ordens das abas e titulo delas -->
                            <ul class="nav nav-tabs" role="tablist" >

                          
                            <li class="nav-item">
                                    <a class="nav-link"  id="dados-tab" data-toggle="tab" href="#dados" role="tab" aria-controls="dados" aria-selected="false" >Dados Pessoais
                                      <i class="fa fa-check font-green"></i>
                                   </a>
                                    </li>



                                <li class="nav-item">
                                    <a class="nav-link"  id="endereco-tab" data-toggle="tab" href="#endereco" role="tab" aria-controls="endereco" aria-selected="false" > Endereço:
                                        <i class="fa fa-check font-green"></i>
                                    </a>
                                </li>

                        
                                <li class="nav-item">
                                    <a class="nav-link"  id="doc-tab" data-toggle="tab" href="#doc" role="tab" aria-controls="doc" aria-selected="false" > Documentos:
                                        <i class="fa fa-check font-green"></i>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link"  id="status-tab" data-toggle="tab" href="#status" role="tab" aria-controls="status" aria-selected="false" > Status de Recadastramento:
                                        <i class="fa fa-check font-green"></i>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link"  id="contato-tab" data-toggle="tab" href="#contato" role="tab" aria-controls="contato" aria-selected="false" > Contatos:
                                        <i class="fa fa-check font-green"></i>
                                    </a>
                                </li>
                                
                               

                                
                                



                                
                            </ul>
                            
                            <div class="tab-content">

                            
                                
                            <div class="tab-pane active" id="dados" role="tabpanel" aria-labelledby="dados-tab">
                          
                                @include('view.recadast_suprev.abas.aba_cad_dados')
                                </div>

                                <div class="tab-pane " id="endereco" role="tabpanel" aria-labelledby="endereco-tab">
                                @include('view.recadast_suprev.abas.aba_cad_endereco')
                                </div>

                                <div class="tab-pane" id="doc" role="tabpanel" aria-labelledby="doc-tab">
                                @include('view.recadast_suprev.abas.aba_cad_doc')
                                </div>

                                <div class="tab-pane" id="status" role="tabpanel" aria-labelledby="status-tab">
                                @include('view.recadast_suprev.abas.aba_cad_status')
                                </div>


                                <div class="tab-pane" id="contato" role="tabpanel" aria-labelledby="contato-tab">
                                @include('view.recadast_suprev.abas.aba_cad_contato')
                                </div>

                                
                              

                                

                                
                                
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn blue" id="salvar"><span class="fa fa-save"></span> Salvar</button>
                                <button type="button" class="btn default" id="voltar"><span class="fa fa-undo"></span> Voltar</button>
                                <button type="reset" class="btn default">Limpar</button>
                            </div>

                            

                        </div>

                      
                        
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>

</div>




<script type="text/javascript">
    $('#voltar').click(function() {
        var pagina = "{{ route('recad_suprev.index') }}";
        $(location).attr('href', pagina);
    });

    // $('#salvar').click(function() {
    //     var codigo = $('#codigo').val();
    //     if (codigo == '') {
    //         $("#form_recad_suprev").attr("action", "{{ route('recad_suprev.insert') }}");
    //     } else {
    //         $('#_method').val('put');
    //         $("#form_recad_suprev").attr("action", "{{ route('recad_suprev.update') }}");
    //     }
    // }
    // });
</script>

@endsection()