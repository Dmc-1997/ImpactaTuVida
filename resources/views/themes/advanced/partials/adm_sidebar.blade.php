<div data-v-1becb169="" class="sidebar-left" type="basic">
    <div class="sidebar-body scroll-pane">
        <div class="side-nav">
            <div class="menu-group">

                <livewire:debug></livewire:debug>

                @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                    <a href="{{ route('admin.index') }}" class="menu-item {{ 0 == $nav_active ? 'active' : '' }}">
                        <i class="fa fa-fw fa-tachometer-alt {{ 0 == $nav_active ? 'text-primary' : '' }} ml-4"></i>
                        <span class="ml-3 menu-text">Inicio</span>
                    </a>

                    <a href="{{ route('mysettings.index') }}"
                        class="menu-item  {{ -1 == $nav_active ? 'active' : '' }}">
                        <i class="fa fa-fw fa-cog ml-4  {{ -1 == $nav_active ? 'text-primary' : '' }}"></i>
                        <span class="ml-3 menu-text">Configuraciones</span>
                    </a>

                    <a href="{{ route('admin.users') }}" class="menu-item  {{ 1 == $nav_active ? 'active' : '' }}">
                        <i class="fa fa-fw fa-users ml-4  {{ 1 == $nav_active ? 'text-primary' : '' }}"></i>
                        <span class="ml-3 menu-text">Usuarios</span>
                    </a>

                    <a href="{{ route('admin.categories.index') }}"
                        class="menu-item {{ 2 == $nav_active ? 'active' : '' }}">
                        <i class="fa fa-fw fa-cubes ml-4  {{ 2 == $nav_active ? 'text-primary' : '' }}"></i>
                        <span class="ml-3 menu-text">Categorías</span>
                    </a>

                    <a href="{{ route('admin.courses.index') }}"
                        class="menu-item {{ 3 == $nav_active ? 'active' : '' }}">
                        <i class="fa fa-fw fa-compass ml-4  {{ 3 == $nav_active ? 'text-primary' : '' }}"></i>
                        <span class="ml-3 menu-text">Cursos</span>
                    </a>
                @elseif (Auth::user()->role == 'business')
                    <a href="{{ route('businesses.index') }}"
                        class="menu-item {{ 0 == $nav_active ? 'active' : '' }}">
                        <i class="fa fa-fw fa-tachometer-alt {{ 0 == $nav_active ? 'text-primary' : '' }} ml-4"></i>
                        <span class="ml-3 menu-text">Inicio</span>
                    </a>
                    <a href="{{ route('businesses.configuration') }}"
                        class="menu-item  {{ 2 == $nav_active ? 'active' : '' }}">
                        <i class="fa fa-fw fa-cogs ml-4  {{ 2 == $nav_active ? 'text-primary' : '' }}"></i>
                        <span class="ml-3 menu-text">Configuración</span>
                    </a>
                    <a href="{{ route('businesses.users') }}"
                        class="menu-item  {{ 1 == $nav_active ? 'active' : '' }}">
                        <i class="fa fa-fw fa-users ml-4  {{ 1 == $nav_active ? 'text-primary' : '' }}"></i>
                        <span class="ml-3 menu-text">Usuarios</span>
                    </a>
                    <a href="{{ route('businesses.courses.index') }}"
                        class="menu-item {{ 3 == $nav_active ? 'active' : '' }}">
                        <i class="fa fa-fw fa-compass ml-4  {{ 3 == $nav_active ? 'text-primary' : '' }}"></i>
                        <span class="ml-3 menu-text">Cursos</span>
                    </a>
                @else
                    <a href="{{ route('members.index') }}" class="menu-item {{ 0 == $nav_active ? 'active' : '' }}">
                        <i class="fa fa-fw fa-tachometer-alt {{ 0 == $nav_active ? 'text-primary' : '' }} ml-4"></i>
                        <span class="ml-3 menu-text">Inicio</span>
                    </a>
                    <a href="{{ route('members.profile') }}"
                        class="menu-item {{ -2 == $nav_active ? 'active' : '' }}">
                        <i class="fa fa-fw fa-th-list {{ -2 == $nav_active ? 'text-primary' : '' }} ml-4"></i>
                        <span class="ml-3 menu-text">Perfil</span>
                    </a>
                    <a href="{{ route('members.mycourses') }}"
                        class="menu-item {{ 3 == $nav_active ? 'active' : '' }}">
                        <i class="fa fa-fw fa-th-list {{ 3 == $nav_active ? 'text-primary' : '' }} ml-4"></i>
                        <span class="ml-3 menu-text">Cursos</span>
                    </a>
                @endif

            </div>

        </div>
    </div>
</div>
