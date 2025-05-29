<header class="draftdayz-header">
    <div class="container">
        <nav class="desktop-menu">
            <div class="logo">
                <a href="{{url('/')}}">
                    <img src="{{asset('assets/images/logo.png')}}" alt="Brand Name" loading="lazy"></a>
            </div>

            <div class="main-menu">
                <ul>
                    <li><a class="{{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                    <li><a class="{{ Route::is('leagues') ? 'active' : '' }}" href="{{ route('leagues') }}">Leagues</a></li>
                    <li><a class="{{ Route::is('play-guide') ? 'active' : '' }}" href="{{ route('play-guide') }}">Play Guide</a></li>             
                    <li><a class="{{ Route::is('about.us') ? 'active' : '' }}" href="{{ route('about.us') }}">About Us</a></li>
                    <li><a class="{{ Route::is('contact.us') ? 'active' : '' }}" href="{{ route('contact.us') }}">Contact Us</a></li>
                    {{-- <li><a href="{{route('profile.profile')}}">Profile</a></li> --}}
                    @if(!Auth::check())
                    {{-- <li><a href="{{route('register')}}" class="header-btn hdr-login">SIGN UP</a></li>&nbsp; --}}
                    <li><a href="{{route('login')}}" class="header-btn hdr-signup">LOG IN</a></li>
                    @endif
                </ul>

                <div class="close-icon"><img src="{{asset('assets/images/close.png')}}" alt="close-btn"></div>
            </div>

            @if(Auth::check())

            <div class="profile">
                <div class="avatar">
                    <div class="avatar-content">
                        <a href="javascript:void(0)">
                            {{-- <img src="{{asset('assets/images/player1.png')}}" alt="king"> --}}
                            <img src="{{(!empty(Auth::user()->image)) ? asset(Auth::user()->image) : asset('assets/images/user-img.png') }}" alt="dp">
                            <span>{{ ucfirst(Auth::user()->first_name.' '.Auth::user()->last_name) }}</span></a>
                        </a>
                        <img class="dropdown-arrow profile-down-arrow" src="{{asset('assets/images/down-arrow.png')}}" alt="icon">
                        <img class="dropdown-arrow profile-up-arrow" style="display: none;" src="{{asset('assets/images/profile-up-arrow.png')}}" alt="icon">
                    </div>
                    <div class="dropdown">
                        <ul>
                            <li>
                                <a href="{{route('profile.profile')}}"><img src="{{asset('assets/images/profile-user.png')}}" alt="user">My Profile</a>
                            </li>
                            <li>
                                <a href="{{route('profile.matches')}}"><img src="{{asset('assets/images/stadium.png')}}" alt="stadium">My
                                    Matches</a>
                            </li>
                            <li>
                                <a href="{{route('logout')}}"><img src="{{asset('assets/images/log-out.png')}}" alt="">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
            </div>

            @endif

            <div class="menu-icon"><img src="{{asset('assets/images/menu.png')}}" alt="menu-btn"></div>
        </nav>
    </div>
</header>
