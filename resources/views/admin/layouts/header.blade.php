<div class="row border-bottom white-bg">
    <nav class="navbar navbar-expand-lg navbar-static-top" role="navigation">
        <!--<div class="navbar-header">-->
            <!--<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">-->
                <!--<i class="fa fa-reorder"></i>-->
            <!--</button>-->

            <a href="{{ route('admin.dashboard') }}" class="navbar-brand">Bike Park GK</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-reorder"></i>
            </button>

        <!--</div>-->
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav mr-auto">
                <li class="active">
                    <a aria-expanded="false" role="button" href="{{ route('home') }}">Home</a>
                </li>
                <li class="dropdown">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Menu item</a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="">Menu item</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-top-links navbar-right">
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
                            @if(Auth::user()->is_admin)
                                <li>
                                    <a href="{{ route('admin.dashboard')}}">
                                        <div>
                                            <i class="fa fa-dashboard fa-fw"></i> Dashboard
                                        </div>
                                    </a>
                                </li>
                            @endif
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
        </div>
    </nav>
</div>