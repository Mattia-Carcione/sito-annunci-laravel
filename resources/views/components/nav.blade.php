<nav class="navbar navbar-expand-lg navbar-color-personal text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('homepage') }}">FindEasy</a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
            aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('announcements.index') }}">Annunci</a>
                </li>
                <li class="nav-item mx-0 mx-lg-1 align-items-center d-flex">

                    <div class="dropdown">
                        <a class=" dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Categorie
                        </a>

                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item"
                                        href="{{ route('categories.show', compact('category')) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>

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
                    {{-- <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">About</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact">Contact</a>
                    </li> --}}
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="{{ route('announcements.create') }}">Inserisci annuncio</a>
                    </li>

                    @if (Auth::user()->is_revisor)
                        <li class="nav-item mx-0 mx-lg-1 d-flex align-items-center">
                            <a class="nav-link position-relative" aria-current="page" href="{{ route('revisor.index') }}" id="navbar" role="button">Zona Revisore
                                <span class="position-absolut top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ App\Models\Announcement::toBeRevisionedCount() }}
                                    <span class="visually-hidden">Unread Messages</span>
                                </span>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item mx-0 mx-lg-1 d-flex align-items-center">
                        <a class="nav-link" href="#" id="navbar" role="button">{{ Auth::user()->name }}</a>
                    </li>

                    <li class="nav-item mx-0 mx-lg-1 d-flex align-items-center">
                        <form id="form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-light"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
            <form class="d-flex" role="search" action="{{route('announcements.search')}}" method="GET">
                <input class="form-control me-2" name="searched" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Cerca</button>
            </form>
        </div>
    </div>
</nav>
