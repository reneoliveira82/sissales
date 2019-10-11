<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" /> 
    <title>Login | Sistema Inspeção de Chamado</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('metronic/assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('metronic/assets/global/css/components-rounded.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{asset('metronic/assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{asset('metronic/assets/pages/css/login-3.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->

    <link rel="shortcut icon" href="imagens/favicon.ico" />
</head>

<body class=" login">
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="index.html">
            <img src="{{asset('imagens/logo_ba_2019.png')}}" class="logo-default" width="290">
        </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" action="{{ route('login.entrar') }}" method="post">
            @csrf
            <input type="hidden" name="comando" id="comando" value="login">
            <h3 class="form-title">Acesse sua conta</h3>
            <!--div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Informe o usuário e senha. </span>
                </div-->
            <!--isset($oLoginController->view->MSG) ? $oLoginController->view->MSG : "";-->
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Usuário</label>
                <div class="input-icon">
                    <i class="fa fa-user"></i>
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Usuário" name="CHAVE_ACESSO" id="CHAVE_ACESSO" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Senha</label>
                <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Senha" name="SENHA" id="SENHA" />
                </div>
            </div>
            <div class="form-actions">
                <label></label>
                <button type="submit" class="btn green pull-right"> Entrar </button>
            </div>


        </form>
        <!-- END LOGIN FORM -->


        <!-- BEGIN FORGOT PASSWORD FORM -->
        <form class="forget-form" action="" method="post">
            <h3>Esqueceu sua senha ?</h3>
            <p> Informe seu email abaixo para recuperar sua senha. </p>

            <div class="form-group">
                <div class="input-icon">
                    <i class="fa fa-envelope"></i>
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
            </div>
            <div class="form-actions">
                <button type="button" id="back-btn" class="btn grey-salsa btn-outline"> Voltar </button>
                <button type="submit" class="btn green pull-right"> Enviar </button>
            </div>
        </form>
        <!-- END FORGOT PASSWORD FORM -->


        <!-- BEGIN REGISTRATION FORM -->

        <!-- END REGISTRATION FORM -->


    </div>
    <!-- END LOGIN -->


    <!-- BEGIN CORE PLUGINS -->
    <script src="{{asset('metronic/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('metronic/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('metronic/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('metronic/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('metronic/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('metronic/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('metronic/assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('metronic/assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{asset('metronic/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('metronic/assets/pages/scripts/login.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <!-- END THEME LAYOUT SCRIPTS -->
</body>


<script type="text/javascript">
</script>

</html>