<header class="header">
    <div class="container-fluid">
        <div class="row linea">
            <div class="col-3">
                @guest
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('img/icons/logo.svg') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    </a>
                @else
                @if(auth()->user()->role->name == 'Admin')
                    <a class="navbar-brand" href="{{ url('/dashboard') }}">
                        <img src="{{ asset('img/icons/logo.svg') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    </a>
                @else
                    <a class="navbar-brand" href="{{ url('/calendar') }}">
                        <img src="{{ asset('img/icons/logo.svg') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    </a>
                @endif
                
                @endguest
            </div>
            <div class="col-9">
                <div class="row justify-content-end">
                    <a class="nav-link headerlink" href="{{ route('contact') }}">Contact</a>
                    @guest
                        @if (Route::has('login'))
                            <a class="nav-link headerlink" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif

                        @if (Route::has('register'))
                            <a class="nav-link headerlink" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                    <div class="routes-list">
                        <a class="nav-link headerlink" href="{{ route('profile.edit') }}">Profile</a>
                    </div>
                    <div class="routes-list ms-auto">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</header>
