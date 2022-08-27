<header class="header-top navbar hidden-print">
    <button type="button" class="navbar-toggle side-nav-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <div class="navbar-header">
        <a href="#dashboard">
            {!! Html::image('img/logo.png','pref-camapua',['class' => 'center-block','width' => '110']) !!}
        </a>
    </div>
    <div class="collapse navbar-collapse" id="headerNavbarCollapse">
        <ul class="nav navbar-nav navbar-right">
            <li class="user-profile dropdown">
                <a href="#" class="clearfix dropdown-toggle" data-toggle="dropdown">
                    <div class="user-name">{{Auth::user()->name}} <span class="caret m-l-5"></span></div>
                </a>
                <ul class="dropdown-menu dropdown-animated pop-effect" role="menu">
                    <li><a href="{{route('admin.user.myData')}}">Meus Dados</a></li>
                    <li><a href="{{route('admin.user.changePassword')}}">Mudar Senha</a></li>
                    <li><a href="{{route('logout')}}">Sair</a></li>
                </ul>
            </li>

        </ul>
    </div>
</header>l