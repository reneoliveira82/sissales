@extends('layout.default')

@section('titulo', 'Criar Usuário | Sistema Gestão de Recadastramento')

@section('conteudo')

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-head">
            <div class="page-title">
                <h1>Usuário</h1>
            </div>

        </div>

        @if (session('msg')) {!! session('msg') !!} @endif


        <div class="row">
            <div class="col-md-12 ">

                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-green">
                            <i class="icon-settings font-green"></i>
                            <span class="caption-subject bold uppercase">{{ isset($registros->id) ? 'Alterar Dados do' : 'Cadastrar' }} Usuário</span>

                        </div>
                    </div>

                    <div class="portlet-body">

                            <div class="tabbable tabbable-tabdrop">

                                    <ul class="nav nav-tabs">
                                        <li class="{{ (!session('active')) ? 'active' : '' }}"">
                                            <a href=" #tab1" data-toggle="tab">Usuário
                                            <i class="{{ isset($registros->id) ? 'fa fa-check font-green' : ''}}"></i>
                                            </a>
                                        </li>
        
                                        <li class="{{ (session('active') && session('active') == 'perfil_usuario') ? 'active' : '' }}">
                                            <a {!! isset($registros->id) ? 'href="#tab2" data-toggle="tab"' : 'onclick="alerta()"' !!} > Perfil do Usuário
                                                <i class="{{ isset($perfil_user[0]->pu_id) ? 'fa fa-check font-green' : ''}}"></i>
                                            </a>
                                        </li>
        
                                    </ul>
        
        
                                    <div class="tab-content">
        
                                        <div class="tab-pane {{ (!session('active')) ? 'active' : '' }}" id="tab1">
                                            @include('view.usuario.abas.aba_usuario')
                                        </div>
        
                                        <div class="tab-pane {{ (session('active') && session('active') == 'perfil_usuario') ? 'active' : '' }}" id="tab2">
                                            @include('view.usuario.abas.aba_perfil_usuario')
                                        </div>
        
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

    function alerta() {
        swal({
            position: 'center',
            type: 'warning',
            title: 'Finalize o cadastro do usuário.',
            showConfirmButton: true
        });
    }

    $('#cep').change(function() {
        if (this.value.length < 10) {
            this.value = "";;
        }
    });

    $('#voltar').click(function() {
        var pagina = "{{ route('usuario.aprovar.solicitacao.conta') }}";
        $(location).attr('href', pagina);
    });

    $('#salvar_usuario').click(function() {
        var codigo = $('#codigo').val();
        if (codigo == '') {
            $("#form_usuario").attr("action", "{{ route('usuario.insert') }}");
        } else {
            $('#_method').val('put');
            $("#form_usuario").attr("action", "{{ route('usuario.update', '_codigo_') }}".replace('_codigo_', codigo));
        }
    });

    $('#salvar_perfil_usuario').click(function() {
        $("#form_perfil_usuario").attr("action", "{{ route('user.insert.perfil') }}");
    });

    function excluir(o) {
        var id = o.data('id');
        var aba = o.data('aba');

        if (aba == 'perfil_user') {
            $("#form_perfil_usuario").attr("action", "{{ route('user.delete.perfil', '_codigo_') }}".replace('_codigo_', id));
            document.forms['form_perfil_usuario'].submit();
        }
    }

    $('#cpf').keyup(function(){
        mascara(this, mCPF);
    });            
    $('#cpf').blur(function () {
        if (CPF.valida($(this).val()) == "CPF Inválido" && $('#cpf').val().length > 0) {
            $('#msg_error').html('CPF Inválido');
            /*swal({
                position: 'center',
                type: 'warning',
                title: 'CPF Inválido',
                showConfirmButton: true,
                timer: 2000
            });*/
            $('#cpf').val('');
            $('#cpf').focus();
        }else{
            $('#msg_error').html('');
        }
    });

    $('#perfil_acesso_id').change(function() {
        var id = $('#perfil_acesso_id').val();
        $.ajax({
            url: "{{ route('user.dados.perfilacesso') }}",
            type: 'GET',
            data: {
                perfil_acesso_id: id
            },
            beforeSend: function() {
                $('#dadosLegislacao').html("<div class='col-md-12 text-center'><div class='col-md-12'></div>Carregando...</div>");
                //$('#dadosLegislacao').html("<div class='text-center'>Carregando...</div>");
            },
            success: function(data) {
                $('#dadosPerfilAcesso').html('');
                var grupo = '';
                $.each(data, function(){
                    if (grupo != this.p_grupo){
                        /*if(grupo != ''){
                            $('#dadosPerfilAcesso').append("</div></div>");
                            //final = "</div></div>";
                        }else{
                            final = "";
                        }*/
                        nome_grupo = "<div class='col-lg-2 col-md-4 col-xs-12'><div class='mt-element-ribbon ' style='background-color: white; height: 160px;overflow: auto;' id='"+ this.p_grupo +"'><div class='ribbon ribbon-color-primary uppercase' style='font-size: 12px;'>"+this.p_grupo.replace(/_/g, ' ')+"</div>"
                    }else{
                        nome_grupo = '';
                    }
                    $('#dadosPerfilAcesso').append(nome_grupo);
                    $('#'+this.p_grupo).append("<div class='ribbon-content' style='padding-bottom: 0; padding-top: 8px;'>"+ this.p_descricao +"</div>");
                    grupo = this.p_grupo;
                });
                /*if(grupo != ''){
                    //final = "</div></div>";
                    $('#dadosPerfilAcesso').append("</div></div>");
                }*/

            }
        });
    });

    //VERIFICA DADOS JÁ CADASTRADOS
    function consultaCampo(value, id, msg_error){
        $.ajax({
            url: "{{ route('verifica.dados') }}",
            type: 'GET',
            data : {
                valor: value,
                campo: id
            },
            beforeSend: function() {
                $("#load_"+id).append("<img id='load' src='imagens/loading.gif'>");
            },
            success: function(valor) {
                if (valor == 1){
                    $('#msg_valida_'+id).html(msg_error);
                    $("#"+id).val("");
                    $('#'+id).focus();
                }else{
                    $("#msg_valida_"+id).html('');
                }
                $("#load").remove();
            }
        });    
    }
</script>

@endsection()