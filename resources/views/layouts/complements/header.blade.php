<header class="header">
    <div class="container-fluid">
        <div class="row linea">
            <div class="col-3">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/icons/logo.svg') }}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                </a>
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
                    <ul class="routes-list ms-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</header>