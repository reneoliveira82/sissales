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
            @canany (['view_recadastramento','edit_recadastramento'])
            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-list-alt"></i>
                    <span class="title">Vendas</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">     
                    <li class="nav-item ">
                        <a href="{{ route('recad_suprev.index') }}" class="nav-link ">
                            <span class="title"> Recadastramento </span>
                        </a>
                    </li>                                                            
                    <li class="nav-item ">
                        <a href="{{ route('rel_recadastramento.index')}}" class="nav-link ">
                            <span class="title"> Alterar Situação </span>
                        </a>
                    </li>  

                     <li class="nav-item ">
                        <a href="{{ route('vendas.index')}}" class="nav-link ">
                            <span class="title"> Vendas </span>
                        </a>
                    </li>                       
                </ul>
            </li>
            @endcanany
            
            @canany (['view_recadastramento','edit_recadastramento'])
            
            <li class="nav-item start ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-list"></i>
                    <span class="title">Cadastros Básicos</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">                                                                
                    <li class="nav-item ">
                        <a href="{{ route('produtos.index')}}" class="nav-link ">
                            <span class="title">Produtos</span>
                        </a>
                    </li>      
                    <li class="nav-item ">
                        <a href="{{ route('cliente.index')}}" class="nav-link ">
                            <span class="title">Clientes</span>
                        </a>
                    </li>                    
                </ul>
            </li>
            @endcanany
       
            @canany(['view_user','view_perfil_acesso'])             
            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-shield"></i>
                    <span class="title">Segurança</span>
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
            @canany(['view_relatorio_recadastramento'])
            <li class="nav-item start">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-file-text-o"></i>
                    <span class="title">Relatórios</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu ">
        
                    <li class="nav-item ">
                        <a href="{{ route('rel_recadastrados.index')}}" class="nav-link ">
                            <span class="title">Recadastrados</span>
                            <span class="badge" style="background-color: #3598dc" id="servico_cadastrado"></span>
                        </a>
                    </li>
                    @can('view_relatorio_recadastramento')
                    <li class="nav-item ">
                        <a href="{{ route('rel_em_recadastramento.index')}}" class="nav-link ">
                            <span class="title">Em Recadastramento</span>
                            <span class="badge" style="background-color: #3598dc" id="servico_cadastrado"></span>
                        </a>
                    </li>
                    @endcan
                    <li class="nav-item">
                        <a href="{{ route('rel_inativos.index')}}" class="nav-link ">
                            <span class="title">Desligados</span>
                            <span class="badge" style="background-color: #e7505a" id="servico_finalizados"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('rel_visita.index')}}" class="nav-link ">
                            <span class="title">Visita Domiciliar</span>
                            <span class="badge" style="background-color: #e7505a" id="servico_finalizados"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('rel_suspenso.index')}}" class="nav-link ">
                            <span class="title">Suspensos</span>
                            <span class="badge" style="background-color: #e7505a" id="servico_finalizados"></span>
                        </a>
                    </li>                   
                </ul>
            </li>
            @endcanany

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