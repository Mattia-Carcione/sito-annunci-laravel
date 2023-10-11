<nav class="navbar navbar-expand-lg navbar-color-personal text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#page-top">FindEasy</a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
            aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">Home</a>
                </li>
                @guest
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('register') }}">Registrati</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('login') }}">Login</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">About</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{route('announcements.create')}}">Inserisci annuncio</a>
                    </li>

                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link " href="#" id="navbar"  role="button" >{{ Auth::user()->name }}</a>
                    </li>

                    <li class="nav-item mx-0 mx-lg-1">
                        <form id="form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button onclick="event.preventDefault(); this.closest('form').submit();">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth


            </ul>
        </div>
    </div>
</nav>