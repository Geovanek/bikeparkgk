<!--header start-->
<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <a class="logo" href="{{ url('/') }}">
        <b>BIKE PARK<span> GK</span></b>
    </a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
            <li id="header_notification_bar">
                <a data-toggle="dropdown"href="{{route('push')}}">
                    <i class="fa fa-bell-o"></i>
                </a>
            </li>
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            @guest
                <li>
                    <a class="logout" href="{{ route('strava.redirect') }}">
                        <img alt="Login com Strava" width="200" src="{{ asset('img/connect_strava.png') }}">
                    </a>
                </li>
            @else
                <li id="profile" class="dropdown">
                    <a data-toggle="dropdown" class="logout dropdown-toggle" style="font-size: 14px" href="#">
                        <img class="img-circle" width="40" height="40" src="{{ Auth::user()->avatar }}">
                        <strong class="btn-profile">&nbsp; {{ Str::words(Auth::user()->name, 2, '') }}</strong>
                    </a>
                    <ul class="dropdown-menu extended notification">
                        <li>
                            <a href="{{ route('profile', ['id' => Auth::user()->id])}}">
                                <span class="label label-info"><i class="fa fa-user"></i></span>
                                Perfil
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="label label-danger"><i class="fa fa-sign-out"></i></span>
                                {{ __('Logout') }}
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
</header>
<!--header end-->