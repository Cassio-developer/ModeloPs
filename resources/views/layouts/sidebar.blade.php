<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <div class="fas fa-sign-out-alt">
                    <img class="avatar" src="{{ url('assets/img/default-avatar.png') }}" alt="">
                    {{-- MOSTRA NOME USUARIO LOGADO --}}
                    <a class="badge badge-success">
                        Seja bem vindo, {{ Auth::user()->name }}
                    </a>
                </div>

                {{-- MOSTRA NOME USUARIO LOGADO --}}

                <li class="nav-item">
                    <hr style="margin-top: 0px; margin-bottom: 0px; margin: 0px">
                    <a style="margin-top: 0px !important;">
                        <i class="fas fa-user"></i>
                        <p>
                            @if (strlen(Auth::user()->name) > 19)
                                {{ substr(Auth::user()->name, 0, 16) . '...' }}
                            @else
                                {{ Auth::user()->name }}
                            @endif
                        </p>
                    </a>
                    <hr style="margin-top: 0px; margin-bottom: 5px;">
                </li>

                <li class="nav-item {{ request()->Is('/') ? 'active' : '' }}" class="sr-only">
                    <a href="/">
                        <i class="fas fa-home"></i>
                        <p>Menu Incial</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('lista') || request()->is('cadastro') ? 'active' : '' }}">
                    <a data-toggle="collapse" aria-expanded="false" aria-controls="collapseOne" href="#base">
                        <i class="fas fa-users"></i>
                        <p>Exemplo</p>
                        <span class="caret"></span>
                    </a>
                    <div class="expandable collapse {{ request()->routeIs('cadastro') || request()->routeIs('lista') || request()->routeIs('pdf') ? 'show' : '' }}"
                        aria-controls="collapseOne" id="base">
                        <ul class="nav nav-collapse ">
                            <li class="{{ request()->routeIs('cadastro') ? 'active' : '' }}">
                                <a href="{{ route('cadastro') }}">
                                    <span class="sub-item">Cadastro</span>
                                </a>
                            </li>

                </li>


                <li class="{{ request()->routeIs('lista') ? 'active' : '' }}">
                    <a href="{{ route('lista') }}">
                        <span class="sub-item">Lista</span>
                    </a>

                <li class="{{ request()->routeIs('pdf') ? 'active' : '' }}">
                    <a href="">
                        <span class="sub-item">PDF</span>
                    </a>
                </li>
            </ul>
        </div>
        </li>
        <li class="nav-item">
            <a data-toggle="collapse" href="#sidebarLayouts">
                <i class="fas fa-sun" style="font-size:20px" actived></i>
                <p>Projeto Cassio</p>
                <span class="caret"></span>
            </a>
            <div class="expandable collapse" id="sidebarLayouts">
                <ul class="nav nav-collapse">
                    <li class="active'">


                        <!--aqui colocamos NOME ROUTES -->
                    <li class="{{ request()->routeIs('tabelaprotocolo') ? 'active' : '' }}">
                        <a href="{{ route('tabelaprotocolo') }}">
                            <span class="sub-item">Protocolos</span>
                        </a>
                        </a>
                    </li>
                    <!--aqui colocamos NOME ROUTES -->
                    <li class="{{ request()->routeIs('cadastropessoass.index') ? 'active' : '' }}">
                        <a href="{{ route('cadastropessoass.index') }}">
                            <span class="sub-item">Cadastrado pessoa</span>
                        </a>
                        </a>
                    </li>

                    @role('admin')
                        <!--aqui colocamos NOME ROUTES -->
                        <li class="{{ request()->routeIs('usuarios') ? 'active' : '' }}">
                            <a href="{{ route('usuarios') }}">
                                <span class="sub-item">Controle de Usuarios</span>
                            </a>
                            </a>
                        </li>
                    @else
                    @endrole
                    <!--aqui colocamos auditoria -->
                    <li class="{{ request()->routeIs('auditoria') ? 'active' : '' }}">
                        <a href="{{ route('auditoria') }}">
                            <span class="sub-item">Auditoria</span>
                        </a>
                        </a>
                    </li>
        </li>



        <!--aqui colocamos auditoria -->
        <li class="{{ request()->routeIs('cadastrodepart') ? 'active' : '' }}">
            <a href="{{ url('cadastrodepart') }}">
                <span class="sub-item">Cadastrar novo departamento</span>
            </a>
            </a>
        </li>
        </li>

        <!--aqui colocamos auditoria -->
        <li class="{{ request()->routeIs('tabeladepart') ? 'active' : '' }}">
            <a href="{{ url('tabeladepart') }}">
                <span class="sub-item">Lista de Departamento</span>
            </a>
            </a>
        </li>
        <!--somente a estes usuarios sera visivel -->

        @role('admin')
            <!--Acesso permitido! -->
            <!--aqui colocamos auditoria -->
            <li class="{{ request()->routeIs('users/*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}">
                    <span class="sub-item">Administração</span>
                </a>
                </a>
            </li>
            <!--Acesso permitido! -->


            <!--aqui colocamos auditoria -->
            <li class="{{ request()->routeIs('users/*') ? 'active' : '' }}">
                <a href="{{ route('roles.index') }}">
                    <span class="sub-item">Administração Permissões</span>
                </a>
                </a>
            </li>
            <!--aqui colocamos auditoria -->
            <li class="{{ request()->routeIs('users/*') ? 'active' : '' }}">
                <a href="{{ url('register') }}">
                    <span class="sub-item">Criar usuario</span>
                </a>
                </a>
            </li>
        @else
        @endrole

    </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="#sidebarLayouts2">
            <i class="fas fa-bed" actived></i>
            <p>Opção 3</p>
            <span class="caret"></span>
        </a>
        <div class="expandable collapse" id="sidebarLayouts2">
            <ul class="nav nav-collapse">
                <li class="">
                    <a href="#">
                        <span class="sub-item">Página 1</span>
                    </a>
                </li>
                <li class="">
                    <a href="#">
                        <span class="sub-item">Página 2</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a data-toggle="collapse" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            <p>Sair</p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
    </ul>
</div>
</div>
</div>

<!-- End Sidebar -->
