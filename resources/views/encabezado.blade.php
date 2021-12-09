<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #BE42B3;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}" style="color: white;">PayWork</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}" style="color: white;">Home</a>
                </li>
                
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('obras')}}" style="color: white;">Obras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('workers')}}" style="color: white;">Trabajadores</a>
                </li>
                @endauth
            </ul>

            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <a class="nav-link" href="{{ route('login') }}" style="color: white;">{{ __('Login') }}</a>
                @endif

                @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}" style="color: white;">{{ __('Register') }}</a>
                @endif
            @else
                <div class="dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: white;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->email }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('user.delete') }}">
                        {{ __('Eliminar cuenta') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</nav>