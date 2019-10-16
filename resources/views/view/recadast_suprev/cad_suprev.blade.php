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
                            <ul class="nav nav-tabs nav-tabs" role="tablist">
                               <li class="nav-item">
                                <a class="nav-link" id="dados-tab" data-toggle="tab" href="#dados" role="tab"
                                aria-controls="dados" aria-selected="false">Dados Pessoais
                                <i class="fa fa-check font-green"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="endereco-tab" data-toggle="tab" href="#endereco" role="tab"
                            aria-controls="endereco" aria-selected="false"> Endereço:
                            <i class="fa fa-check font-green"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="doc-tab" data-toggle="tab" href="#doc" role="tab"
                        aria-controls="doc" aria-selected="false"> Documentos:
                        <i class="fa fa-check font-green"></i>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" id="contato-tab" data-toggle="tab" href="#contato" role="tab"
                    aria-controls="contato" aria-selected="false"> Contatos:
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

            <div class="tab-pane" id="contato" role="tabpanel" aria-labelledby="contato-tab">
                @include('view.recadast_suprev.abas.aba_cad_contato')
            </div>

        </div>

        {{-- <div class="form-actions">
            <button type="submit" class="btn blue" id="recadastrar"><span class="fa fa-save"></span> Recadastrar </button>
            <button type="button" class="btn default" id="voltar"><span class="fa fa-undo"></span> Voltar</button>
            <button type="reset" class="btn default">Limpar</button>
        </div> --}}
    </div>
    </div>
       </div>
      </div>
     </div>
    </div>
   </div>
</div>
<script type="text/javascript">

// $('#recadastrar_servidor').click(function() {
//         var codigo = $('#codigo').val();
//         if (codigo == '') {
//             $("#form_recadast_suprev").attr("action", "{{ route('recad_suprev.insert') }}");
//         } else {
//             $('#_method').val('put');
//             $("#form_recadast_suprev").attr("action", "{{ route('recad_suprev.update', '_codigo_') }}".replace('_codigo_', codigo));
//         }
//     });
jQuery(function(){
    $("#telefone_2").mask('99999-9999');
});
jQuery(function(){
    $("#tel_resid_1").mask('99999-9999');
});
jQuery(function(){
    $("#celular").mask('9999-9999');
});
jQuery(function(){
    $("#ddd1").mask('99');
});
jQuery(function(){
    $("#ddd2").mask('99');
});
jQuery(function(){
    $("#ddd_cel").mask('99');
});

jQuery(function($){
    $("#dt_val_cnh").mask("99/99/9999");
    });

    $('#cpf').keyup(function(){
        mascara(this, mCPF);
    });  
    jQuery(function($){
    $("#rg").mask("99.999.999-99");
    });
    $('#voltar').click(function() {
        var pagina = "{{ route('recad_suprev.index') }}";
        $(location).attr('href', pagina);
    });
    $('#voltar_end').click(function() {
        var pagina = "{{ route('recad_suprev.index') }}";
        $(location).attr('href', pagina);
    });
    $('#voltar_con').click(function() {
        var pagina = "{{ route('recad_suprev.index') }}";
        $(location).attr('href', pagina);
    });
    $('#voltar_doc').click(function() {
        var pagina = "{{ route('recad_suprev.index') }}";
        $(location).attr('href', pagina);
    });

    $("#btn_dados_recadastrar").click(function(){
         var servidor_id = $('#id_servidor').val(); 
        $("#form_dados_pessoais").attr("action","{{ route('recad_suprev.update', '_codigo_') }}".replace('_codigo_', servidor_id));
    });
    $("#btn_endereco_recadastrar").click(function(){
        var codigo = $('#codigo').val();  
        var endereco_id = $('#endereco_id').val();   
        $("#form_endereco_recadastrar").attr("action","{{ route('recad_suprev_endereco.update', '_codigo_') }}".replace('_codigo_', endereco_id));
    });
    $("#btn_doc_recadastrar").click(function(){
      
        var servidor_id = $('#id_servidor').val();
        $("#form_doc_recadastrar").attr("action","{{ route('recad_suprev.update_doc', '_codigo_') }}".replace('_codigo_', servidor_id));
    });
    $("#btn_contato_recadastrar").click(function(){
        var codigo = $('#codigo').val();
        var id_contato = $('#id_contato').val(); 
        $("#form_contato_recadastrar").attr("action","{{ route('recad_suprev.update_contato', '_codigo_') }}".replace('_codigo_', id_contato));
    });
    $(document).ready(function () {


$("#submit-btn").click(function () {

    beforeSubmit();
});

});




//function to check file size before uploading.
function beforeSubmit() {




//check whether browser fully supports all File API
if (window.File && window.FileReader && window.FileList && window.Blob) {


    var fsize = $('#ARQUIVO')[0].files[0].size; //get file size
    var ftype = $('#ARQUIVO')[0].files[0].type; // get file type

    //allow only valid image file types
    switch (ftype) {
        case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg': case 'application/pdf':
        break;
        default:
      
            return false
    }

    //Allowed file size is less than 1 MB (1048576)
    if (fsize > 1048576) {
        
        return false
    }


    encodeImageFileAsURL(ftype);
}
else {
    //Output error to older unsupported browsers that doesn't support HTML5 File API
    
    return false;
}
}
function encodeImageFileAsURL(ftype){



var fileUpload = $('#ARQUIVO').get(0);
var file = fileUpload.files;


// alert(file);
if (file.length > 0)
{
    var fileToLoad = file[0];

    var fileReader = new FileReader();

    fileReader.onload = function(fileLoadedEvent) {
        var srcData = fileLoadedEvent.target.result; // <--- data: base64

        // alert(srcData);
        upload(srcData,ftype);
    };
    fileReader.readAsDataURL(fileToLoad);
}
}

function upload(base64Image,ftype){


// AJAX Code To Submit Form.
$("#cert_obito").val(base64Image);


}



function bytesToSize(bytes) {
var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
if (bytes == 0) return '0 Bytes';
var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}



    
</script>

@endsection()
