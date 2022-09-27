
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{route('frontend.home')}}">
                    @if(backendSetting('f_logo_image') == true)
                        <img src="{{asset('/')}}assets/frontend/img/logo.png" alt="">
                    @else
                        <h2 style="font-size: 21px;">{{backendSetting('f_text_logo','MKBLOG')}}</h2>
                    @endif

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-center">
                        <li class="nav-item {{Request::is('/') ? 'active' : ''}}"><a class="nav-link" href="{{route('frontend.home')}}">Home</a></li>
                        <li class="nav-item  {{ Request::is('category') ? 'active' : ''}}"><a class="nav-link" href="{{route('frontend.category')}}">Category</a>
                        <li class="nav-item {{ Request::is('contract') ? 'active' : ''}}"><a class="nav-link" href="{{route('frontend.contract')}}">Contact</a></li>
                        @guest
                            <li class="nav-item {{ Request::is('login') ? 'active' : ''}}"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                            <li class="nav-item {{ Request::is('register') ? 'active' : ''}}"><a class="nav-link" href="{{route('register')}}">Registration</a></li>
                        @endguest
                        @auth
                            @if(Auth::user()->is_admin == true)
                                <li class="nav-item {{ Request::is('backend/dashboard') ? 'active' : ''}}"><a class="nav-link" href="{{route('backend.dashboard')}}">Dashboard</a></li>
                            @else
                                <li class="nav-item {{ Request::is('frontend/dashboard') ? 'active' : ''}}"><a class="nav-link" href="{{route('frontend.dashboard')}}">Dashboard</a></li>
                            @endif
                                <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <li class="nav-item {{ Request::is('logout') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{route('logout')}}"  onclick="event.preventDefault();document.getElementById('logoutForm').submit();">
                                        Logout
                                    </a>
                                </li>
                            </form>
                        @endauth
                    </ul>
                    <ul class="nav navbar-nav navbar-right navbar-social">
                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                        <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                        <li><a href="#"><i class="ti-instagram"></i></a></li>
                        <li><a href="#"><i class="ti-skype"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
