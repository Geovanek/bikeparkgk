<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
                <i class="fa fa-bars"></i>
            </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Desafio Local Legend Bike Park GK</span>
                </li>
                @guest
                    <li>
                        <a href="{{ route('strava.redirect') }}">
                            <img alt="Login com Strava" width="100%" src="{{ asset('img/connect_strava.png') }}">
                        </a>
                    </li>
                @else
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <img class="img-circle" width="35" height="35" src="{{ Auth::user()->avatar }}">
                            <strong class="btn-profile">&nbsp; {{ Str::words(Auth::user()->name, 2, '') }}</strong>
                            <i class="fa fa-caret-down fa-fw"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="{{ route('profile', ['id' => Auth::user()->id])}}">
                                    <div>
                                        <i class="fa fa-user fa-fw"></i> Perfil
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <div>
                                        <i class="fa fa-sign-out fa-fw"></i> {{ __('Logout') }}
                                    </div>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>

    </nav>
</div>