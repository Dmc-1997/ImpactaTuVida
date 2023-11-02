<ul class="ps-0 navbar_menu-mobile__gJZ6c">
	@if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
		<li class="mb-2 navbar_nav-item__sfNBM {{ Route::current()->getName() == 'admin.index' ? 'navbar_active__fCu0i' : '' }}">
			<a class="fs-6 mb-0 h1 navbar_nav-link__udAvg" href="{{ route('admin.index') }}">
				<span class="navbar_nav-icon__eF8dk"></span>
				<span class="navbar_text-menu__vr3fz">
					Inicio
				</span>
			</a>
		</li>
		<li class="mb-2 navbar_nav-item__sfNBM {{ Route::current()->getName() == 'mysettings.index' ? 'navbar_active__fCu0i' : '' }}">
			<a class="fs-6 navbar_nav-link__udAvg" href="{{ route('mysettings.index') }}">
				<span class="navbar_nav-icon__eF8dk navbar_icon-config__Ji7aF"></span>
				<span class="navbar_text-menu__vr3fz">
					Configuración
				</span>
			</a>
		</li>
		<li class="mb-2 navbar_nav-item__sfNBM {{ Route::current()->getName() == 'admin.users' ? 'navbar_active__fCu0i' : '' }}">
			<a class="fs-6 navbar_nav-link__udAvg" href="{{ route('admin.users') }}">
				<span class="navbar_nav-icon__eF8dk navbar_icon-user__jmuLf"></span>
				<span class="navbar_text-menu__vr3fz">
					Usuarios
				</span>
			</a>
		</li>
		<li class="mb-2 navbar_nav-item__sfNBM {{ Route::current()->getName() == 'admin.categories.index' ? 'navbar_active__fCu0i' : '' }}">
			<a class="fs-6 navbar_nav-link__udAvg" href="{{ route('admin.categories.index') }}">
				<span class="navbar_nav-icon__eF8dk  navbar_icon-categories__XguqK"></span>
				<span class="navbar_text-menu__vr3fz">
					Categorías
				</span>
			</a>
		</li>
		<li class="mb-2 navbar_nav-item__sfNBM {{ Route::current()->getName() == 'admin.courses.index' ? 'navbar_active__fCu0i' : '' }}">
			<a class="fs-6 mb-0 h1 navbar_nav-link__udAvg" href="{{ route('admin.courses.index') }}">
				<span class="navbar_nav-icon__eF8dk navbar_icon-course__BZtUx"></span>
				<span class="navbar_text-menu__vr3fz">
					Cursos
				</span>
			</a>
		</li>
	@elseif (Auth::user()->role == 'business')
		<li class="mb-2 navbar_nav-item__sfNBM {{ Route::current()->getName() == 'businesses.index' ? 'navbar_active__fCu0i' : '' }}">
			<a class="fs-6 mb-0 h1 navbar_nav-link__udAvg" href="{{ route('businesses.index') }}">
				<span class="navbar_nav-icon__eF8dk"></span>
				<span class="navbar_text-menu__vr3fz">
					Inicio
				</span>
			</a>
		</li>
		<li class="mb-2 navbar_nav-item__sfNBM {{ Route::current()->getName() == 'businesses.configuration' ? 'navbar_active__fCu0i' : '' }}">
			<a class="fs-6 navbar_nav-link__udAvg" href="{{ route('businesses.configuration') }}">
				<span class="navbar_nav-icon__eF8dk navbar_icon-config__Ji7aF"></span>
				<span class="navbar_text-menu__vr3fz">
					Configuración
				</span>
			</a>
		</li>
		<li class="mb-2 navbar_nav-item__sfNBM {{ Route::current()->getName() == 'businesses.users' ? 'navbar_active__fCu0i' : '' }}">
			<a class="fs-6 navbar_nav-link__udAvg" href="{{ route('businesses.users') }}">
				<span class="navbar_nav-icon__eF8dk navbar_icon-user__jmuLf"></span>
				<span class="navbar_text-menu__vr3fz">
					Usuarios
				</span>
			</a>
		</li>
		<li class="mb-2 navbar_nav-item__sfNBM {{ Route::current()->getName() == 'businesses.courses.index' ? 'navbar_active__fCu0i' : '' }}">
			<a class="fs-6 mb-0 h1 navbar_nav-link__udAvg" href="{{ route('businesses.courses.index') }}">
				<span class="navbar_nav-icon__eF8dk navbar_icon-course__BZtUx"></span>
				<span class="navbar_text-menu__vr3fz">
					Cursos
				</span>
			</a>
		</li>
	@else
		<li class="mb-2 navbar_nav-item__sfNBM {{ Route::current()->getName() == 'members.index' ? 'navbar_active__fCu0i' : '' }}">
			<a class="fs-6 mb-0 h1 navbar_nav-link__udAvg" href="{{ route('members.index') }}">
				<span class="navbar_nav-icon__eF8dk"></span>
				<span class="navbar_text-menu__vr3fz">
					Inicio
				</span>
			</a>
		</li>
		<li class="mb-2 navbar_nav-item__sfNBM {{ Route::current()->getName() == 'members.profile' ? 'navbar_active__fCu0i' : '' }}">
			<a class="fs-6 navbar_nav-link__udAvg" href="{{ route('members.profile') }}">
				<span class="navbar_nav-icon__eF8dk navbar_icon-config__Ji7aF"></span>
				<span class="navbar_text-menu__vr3fz">
					Perfil
				</span>
			</a>
		</li>
		<li class="mb-2 navbar_nav-item__sfNBM {{ Route::current()->getName() == 'members.mycourses' ? 'navbar_active__fCu0i' : '' }}">
			<a class="fs-6 mb-0 h1 navbar_nav-link__udAvg" href="{{ route('members.mycourses') }}">
				<span class="navbar_nav-icon__eF8dk navbar_icon-course__BZtUx"></span>
				<span class="navbar_text-menu__vr3fz">
					Cursos
				</span>
			</a>
		</li>
	@endif
</ul>