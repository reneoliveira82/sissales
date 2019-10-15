<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="">
                <img src="{{asset('imagens/logo_ba_2019.png')}}" class="logo-default" width="170" />
            </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->

        <!-- BEGIN PAGE TOP -->
        <div class="page-top pull-left">
<<<<<<< HEAD
            <h3 class="text-center">Sistema de Inspeção de Chamados</h3>
=======
            <h3 class="text-center">Sistema de Vendas</h3>
>>>>>>> 3ad796ac2d54eef20d796a8111f1a3abfaf0a38d
        </div>
        <div class="page-top pull-right">
            
            <div class="page-top pull-left" id="nome_orgao_user"></div>

            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="separator hide"> </li>


                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user ">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile">
                                @php
                                    $nome_completo = explode(' ', Auth::user()->name);
                                    if (count($nome_completo) >= 2 ){
                                        $nome = ucfirst($nome_completo[0]). ' ' .ucfirst($nome_completo[count($nome_completo)-1]);
                                    }else{
                                        $nome = $nome_completo[0];
                                    }
                                @endphp
                                {{ $nome }}
                              
                            </span>
                            <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                            <!-- <img alt="" class="img-circle" src="libs/metronic/assets/layouts/layout4/img/man.png" />-->
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="icon-key"></i>
                                    Sair
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->


                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->

                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>