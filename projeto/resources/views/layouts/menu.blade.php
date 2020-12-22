<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element text-center">
                    <img alt="image" src="{{asset('assets/img/profile_small.png')}}" />
                <div class="logo-element">
                    <img alt="image" src="{{asset('assets/img/profile_smallMenor.png')}}" />
                </div>
            </li>
            <li>
                <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashborard</span></a>
            </li>
            <li>
                <a href="{{ route('grupos.index') }}"><i class="fa fa-group"></i> <span class="nav-label">Grupos</span></a>
            </li>
            <li>
                <a href="{{ route('usuarios.index') }}"><i class="fa fa-user"></i> <span class="nav-label">Usuários</span></a>
            </li>
            <li>
                <a href="{{ route('enviararquivo') }}"><i class="fa fa-upload"></i> <span class="nav-label">Novo arquivo</span></a>
            </li>
        </ul>

    </div>
</nav>