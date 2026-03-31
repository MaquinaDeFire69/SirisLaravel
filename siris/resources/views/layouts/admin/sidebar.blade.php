<div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="{{ route('panel-informativo') }}">SIRIS</a>
            </div>
            <div class="sidebar-toggler x">
                <a href="#" class="sidebar-hide d-xl-none d-block">
                    <i class="bi bi-x bi-middle"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="sidebar-menu">
        <ul class="menu">

            <li class="sidebar-item {{ request()->routeIs('admin.cambiarcontra') ? 'active' : '' }}">
                <a href="{{ route ('admin.cambiarcontra') }}" class='sidebar-link'>
                    <i class="bi bi-person-circle"></i>
                    <span>Mi cuenta</span>
                </a>                
            </li>            

            <li class="sidebar-item {{ request()->routeIs('panel-informativo') ? 'active' : '' }}">
                <a href="{{ route('panel-informativo') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Panel informativo</span>
                </a>
            </li>

            <li class="sidebar-item has-sub {{ request()->routeIs('informe.*') ? 'active' : '' }}">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <span>Informe quincenal</span>
                </a>
                <ul class="submenu">                    
                    <li class="submenu-item {{ request()->routeIs('informe.periodo') ? 'active' : '' }}">
                        <a href="{{ route('informe.periodo') }}" class="submenu-link">
                            Periodo informado
                        </a>                        
                    </li>                    
                    <li class="submenu-item {{ request()->routeIs('informe.ente-publico') ? 'active' : '' }}">
                        <a href="{{ route('informe.ente-publico') }}" class="submenu-link">
                            Entes públicos
                        </a>                        
                    </li>                    
                </ul>
            </li>

            <li class="sidebar-item has-sub {{ request()->routeIs('sancionados.*') ? 'active' : '' }}">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-folder2-open"></i>
                    <span>Sancionados</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item {{ request()->routeIs('sancionados.sancionados') ? 'active' : '' }}">
                        <a href="{{ route('sancionados.sancionados') }}" class="submenu-link">
                            Reportes
                        </a>   
                    </li>
                </ul>                
            </li>

            <li class="sidebar-item has-sub {{ request()->routeIs('conf.*') ? 'active' : '' }}">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-gear-fill"></i>
                    <span>Configuración</span>
                </a>

                <ul class="submenu">                    
                    <li class="submenu-item {{ request()->routeIs('conf.periodo_informe') ? 'active' : '' }}">
                        <a href="{{ route('conf.periodo_informe') }}" class="submenu-link">
                            Periodo informe
                        </a>
                    </li>

                    <li class="submenu-item {{ request()->routeIs('conf.plazo_informe') ? 'active' : '' }}">
                        <a href="{{ route('conf.plazo_informe') }}" class="submenu-link">
                            Plazo informe
                        </a>
                    </li>

                    <li class="submenu-item {{ request()->routeIs('conf.entes_publicos') ? 'active' : '' }}">
                        <a href="{{ route('conf.entes_publicos') }}" class="submenu-link">
                            Entes públicos
                        </a>
                    </li>                    

                    <li class="submenu-item {{ request()->routeIs('conf.registro_usuarios') ? 'active' : '' }}">
                        <a href="{{ route('conf.registro_usuarios') }}" class="submenu-link">
                            Usuario
                        </a>
                    </li>                  
                </ul>
            </li>

            <li class="sidebar-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class='sidebar-link' 
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="bi bi-power"></i>
                        <span>{{ __('Cerrar sesión') }}</span>
                    </a>
                </form>                             
            </li>                

        </ul>
    </div>
</div>