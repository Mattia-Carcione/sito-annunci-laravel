<nav id="intro" class="navbar navbar-expand-lg fixed-top navbar-scroll navbar-color-personal">
    <div class="container-fluid">
        <a class="navbar-brand nav-name" href="{{ route('homepage') }}">FindEasy</a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link nav-a" aria-current="page" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-a" href="{{ route('announcements.index') }}">{{ __('ui.announcements') }}</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class=" dropdown-toggle nav-link nav-a text-light" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ __('ui.categories') }}
                        </a>

                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item nav-a" style=""
                                        href="{{ route('categories.show', compact('category')) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link nav-a" href="{{ route('register') }}">{{ __('ui.register') }}</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link nav-a" href="{{ route('login') }}">Login</a>
                    </li>
                @endguest

                @auth

                    <li class="nav-item ">
                        <a class="nav-link nav-a"
                            href="{{ route('announcements.create') }}">{{ __('ui.createAnnouncement') }}</a>
                    </li>

                    @if (Auth::user()->is_revisor)
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link position-relative nav-a" aria-current="page" href="{{ route('revisor.index') }}"
                                id="navbar" role="button">{{ __('ui.revisorZone') }}
                                <span class="position-absolut top-0 start-100 translate-middle badge rounded-pill"
                                    style="background-color: #C5DCDC">
                                    {{ App\Models\Announcement::toBeRevisionedCount() }}
                                    <span class="visually-hidden">Unread Messages</span>
                                </span>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item d-flex align-items-center dropdown">
                        <a class="nav-link dropdown-toggle nav-a text-light" href="#" id="#" role="button"
                            data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item nav-a" href="#">{{ __('ui.profile') }}</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item nav-a" href="#"
                                    onclick="event.preventDefault(); getElementById('form').submit();">
                                    Logout</a></li>
                            <form id="form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @endauth

                <li class="nav-item">

                    <div class="dropdown">
                        <a class=" dropdown-toggle nav-link nav-a text-light" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ __('ui.language') }}
                        </a>

                        <ul class="dropdown-menu">

                            <li class=" nav-a">
                                <x-_locale lang='it' nation='it' />
                            </li>

                            <li class=" nav-a">
                                <x-_locale lang='en' nation='gb' />
                            </li>

                            <li class=" nav-a">
                                <x-_locale lang='es' nation='es' />
                            </li>

                        </ul>
                    </div>
                </li>

            </ul>
            <ul class="navbar-nav d-flex flex-row">
                <li class="nav-item me-3 me-lg-0">
                    <form class="d-flex" role="search" action="{{ route('announcements.search') }}" method="GET">
                        <input class="form-control me-2" name="searched" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn" style="background-color: #C5DCDC"
                            type="submit">{{ __('ui.search') }}</button>
                    </form>
                </li>

            </ul>

        </div>
    </div>
</nav>
<!-- Navbar -->
