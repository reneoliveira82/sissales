<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start ">
                <a href="{{ route('home.index') }}" class="nav-link ">
                    <i class="icon-home"></i>
                    <span class="title">Principal</span>
                </a>
            </li>

            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-list"></i>
                    <span class="title">Cadastros Básicos</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                   
                    <li class="nav-item ">
                        <a href="#" class="nav-link ">
                            <span class="title">Registrar Chamado</span>
                        </a>
                    </li>                        
                  
                    <li class="nav-item ">
                        <a href="{{ route('recad_suprev.index') }}" class="nav-link ">
                            <span class="title"></span>
                        </a>
                    </li>                        
                 
                    
                    <li class="nav-item ">
                        <a href="#" class="nav-link ">
                            <span class="title">Em Desenvolvimento</span>
                        </a>
                    </li>                        
                </ul>
            </li>
       
            @canany(['view_user','view_perfil_acesso'])             
            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title">Usuários</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu ">

                    @can('view_user') 
                   <li class="nav-item ">
                        <a href="{{ route('usuario.index') }}" class="nav-link ">
                            <span class="title">Usuários</span>
                        </a>
                    </li>                        
                   @endcan
                   
                   @can('view_user')
                    <li class="nav-item ">
                        <a href="{{ route('usuario.aprovar.solicitacao.conta') }}" class="nav-link ">
                            <span class="title">Usuários a Aprovar</span>
                            <span class="badge" style="background-color: #578ebe" id="usuarios_aprovar"></span>
                        </a>
                    </li>                        
                    @endcan

                    @can('view_perfil_acesso')
                    <li class="nav-item">
                        <a href="{{ route('perfil_acesso.index') }}" class="nav-link ">
                            <span class="title">Perfil de Acesso</span>
                            <span class="selected"></span>
                        </a>
                    </li>                        
                    @endcan
                </ul>
            </li>
            @endcanany
            
            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-file-text-o"></i>
                    <span class="title">Relatórios</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu ">
        
                    <li class="nav-item ">
                        <a href="" class="nav-link ">
                            <span class="title">RECADASTRAMENTO</span>
                            <span class="badge" style="background-color: #3598dc" id="servico_cadastrado"></span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('rel_recadastramento.index')}}" class="nav-link ">
                            <span class="title">RELATÓRIO DE RECADASTRAMENTO</span>
                            <span class="badge" style="background-color: #3598dc" id="servico_cadastrado"></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <span class="title">COMPROVANTE DE RECADASTRAMENTO</span>
                            <span class="badge" style="background-color: #e7505a" id="servico_finalizados"></span>
                        </a>
                    </li>  

                    <li class="nav-item">
                        <a href="{{ route('rel_inativos.index')}}" class="nav-link ">
                            <span class="title">INATIVOS</span>
                            <span class="badge" style="background-color: #e7505a" id="servico_finalizados"></span>
                        </a>
                    </li>             
                </ul>
            </li>

            <li class="nav-item start">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                    <i class="fa fa-sign-out"></i>
                    <span class="title"> Sair</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>