<header data-v-1becb169="" class="site-header">
    <a href="{{ url('/') }}" class="brand-main">
        @if (Auth::user()->role == 'business' || Auth::user()->role == 'member')
            @php
                $logo = '';
                $team = \App\Models\Team::whereId(Auth::user()->current_team_id)->first();
                if (!is_null($team)) {
                    $logo = $team->logo;
                }
            @endphp
            @if (file_exists(public_path() . '/imagenes/logos/' . $logo) && $logo != '' && $logo != 'default.jpg')
                <img src="{{ asset('imagenes/logos/' . $logo) }}" class="logo" />
            @else
                <img class="logo-img" src="{{ asset('/images/logo.png') }}">
            @endif
        @else
            <img class="logo-img" src="{{ asset('/images/logo.png') }}">
        @endif
    </a>
    <a href="{{ url('/') }}" class="nav-toggle">
        <div class="hamburger hamburger--arrowturn" id="hamburger">
            <div class="hamburger-box">
                <div class="hamburger-inner">
                </div>
            </div>
        </div>
    </a>


    <ul class="action-list">
        <li>
            <div class="dropdown">
                <div class="noarrow" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" style="background-color: #ffffff!important;">
                    <img src="{{ auth()->user()->profile_photo_url }}" class="rounded-circle"
                        alt="{{ auth()->user()->name }}" width="40px">
                </div>
                <div class="dropdown-menu border-light" aria-labelledby="dropdownMenuButton">
                    <!--div class="dropdown-group-item">
                        <a class="dropdown-item" href="{{ route('myaccount') }}">
                            <i class="ml-2 fa fa-key"></i>  Mi cuenta
                        </a>
                    </div-->
                    <div class="dropdown-group-item">
                        @if (Auth::user()->role == 'member')
                            <a class="dropdown-item" href="{{ route('members.profile') }}">
                                Perfil
                            </a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logoutv2') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="ml-2 fa fa-sign-out-alt"></i> Salir
                        </a>

                        <form id="logout-form" action="{{ route('logoutv2') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </li>

    </ul>
</header>
