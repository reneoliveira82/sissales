<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistema Vendas') }}</title>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    <!-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> -->

    <script src="{{asset('metronic/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/mask.js') }}"></script>

    <style>
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 37px;
        }

        .select2-container .select2-selection--single {
            height: 38px;
        }

        .select2-selection__placeholder {
            font-size: 16px;
        }
    </style>

</head>

<body style="background-color: #a0b4c9!important">

    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5">

                        <div class="text-center" style="padding-top: 25px; padding-bottom: 20px">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src="{{asset('imagens/logo_ba_2019.png')}}" class="logo-default" width="300">
                            </a>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

<script>
    $(".orgao").select2({
        placeholder: "Órgão",
        allowClear: true
    });

    $(".vinculo_empregaticio").select2({
        placeholder: "Vínculo Empregatício",
        allowClear: true
    });

    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    $('#password-confirm').blur(function() {
        var password = $('#password').val();
        var password_confirm = $('#password-confirm').val();

        if (password.length < 6) {
            $('#password').addClass('is-invalid');
            $('#password').val('');
            $('#password-confirm').val('');
            $('#password').focus();
            $('.password').children('.invalid-feedback').html('A senha deve ter pelo menos 6 caracteres.');
        } else {
            if (password != password_confirm) {
                $('#password').addClass('is-invalid');
                $('#password-confirm').addClass('is-invalid');
                $('#password').val('');
                $('#password-confirm').val('');
                $('#password').focus();
                $('.password').children('.invalid-feedback').html('Essas senhas não coincidem.');
            } else {
                $('#password').removeClass('is-invalid');
                $('#password-confirm').removeClass('is-invalid');
            }
        }
    });


    $('#cpf').keyup(function() {
        mascara(this, mCPF);
    });
    $('#cpf').blur(function() {
        if (CPF.valida($(this).val()) == "CPF Inválido" && $('#cpf').val().length > 0) {
            $('#cpf').addClass('is-invalid');
            $('#load_cpf').children('.invalid-feedback').html('CPF Inválido');
            $('#cpf').val('');
            $('#cpf').focus();
        } else {
            $('#cpf').removeClass('is-invalid');
        }
    });

    if (id('telefone')) {
        id('telefone').onkeyup = function() {
            mascara(this, mtel);
        };
        id('telefone').onblur = function() {
            if (this.value.length < 14) {
                this.value = "";
            }
        };
    }

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
                    $('#'+id).addClass('is-invalid');
                    $("#load_"+id).children('.invalid-feedback').html('');
                }else{
                    $("#msg_valida_"+id).html('');
                }
                $("#load").remove();
            }
        });    
    }
    
    $('#voltar').click(function(){
        var pagina = "{{ route('login') }}";
        $(location).attr('href', pagina);
    });   
</script>

</html>