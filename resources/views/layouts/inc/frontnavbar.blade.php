<nav class="navi navbar navbar-expand-lg ">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Dekorácie Lussy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Domov</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ url('fcategory') }}">Kategórie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ url('/about') }}">O nás
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ url('cart') }}">Košík
                        <span class="badge badge-pill cart-count">0</span>
                    </a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('my-orders') }}">
                                    Moje objednávky
                                </a>
                            </li>
                            @if(Auth::user()->role_as == '1')
                                <li><a class="dropdown-item" href="{{url('/dashboard')}}">
                                        Admin stránka
                                    </a>
                                </li>
                            @endif
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Odhlásiť sa') }}
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
    </div>
</nav>
