<nav id="intro" class="navbar navbar-expand-lg fixed-top navbar-scroll navbar-color-personal">
    <div class="container-fluid">
        <a class="titolo navbar-brand nav-name" href="{{ route('homepage') }}">FindEasy</a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto" style="flex: 1;">
                <li class="nav-item px-1">
                    <a class="nav-link nav-a" aria-current="page" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item px-1">
                    <a class="nav-link nav-a" href="{{ route('announcements.index') }}">{{ __('ui.announcements') }}</a>
                </li>
                <li class="nav-item px-1">
                    <div class="dropdown">
                        <a class=" dropdown-toggle nav-link nav-a text-light" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('ui.categories') }}
                        </a>

                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li class="px-1"><a class="dropdown-item nav-a" style=""
                                        href="{{ route('categories.show', compact('category')) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </li>

                <li class="nav-item">

                    <div class="dropdown">
                        <a class=" dropdown-toggle nav-link nav-a text-light" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('ui.language') }}
                        </a>

                        <ul class="dropdown-menu">

                            <li class=" nav-a d-flex align-items-center">
                                <x-_locale lang='it' nation='it' text='Italiano' />
                            </li>

                            <li class=" nav-a d-flex align-items-center">
                                <x-_locale lang='en' nation='gb' text='English' />
                            </li>

                            <li class=" nav-a d-flex align-items-center">
                                <x-_locale lang='es' nation='es' text='Español' />
                            </li>

                        </ul>
                    </div>
                </li>
                @auth

                    <li class="nav-item px-1">
                        <a class="nav-link nav-a"
                            href="{{ route('announcements.create') }}">{{ __('ui.createAnnouncement') }}</a>
                    </li>

                    
                </ul>
                <div class="d-flex justify-content-end align-items-center">
                    <ul class="navbar-nav me-auto" style="padding-right: 2.5rem">
                        @if (Auth::user()->is_revisor)
                        <li class="nav-item d-flex align-items-center px-1 mx-2">
                            <a class="nav-link position-relative nav-a" aria-current="page"
                                href="{{ route('revisor.index') }}" id="navbar"
                                role="button">{{ __('ui.revisorZone') }}
                                <span class="position-absolut top-0 start-100 translate-middle badge rounded-pill"
                                    style="background-color: #C5DCDC">
                                    {{ App\Models\Announcement::toBeRevisionedCount() }}
                                    <span class="visually-hidden">Unread Messages</span>
                                </span>
                            </a>
                        </li>
                    @endif
                        <li class="nav-item d-flex align-items-center dropdown">
                            <a class="nav-link dropdown-toggle nav-a text-light" href="#" id="#"
                                role="button" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item nav-a" href="{{route('users.profile')}}">{{ __('ui.profile') }}</a></li>
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
                    </ul>
                </div>
            @endauth
            @guest
                <div class="align-items-center justify-content-end" style="flex: 1; padding-right: 1rem ">
                    <ul class="navbar-nav me-auto justify-content-end d-flex">
                        <li class="nav-item  d-flex px-1">
                            <a class="nav-link nav-a text-light"
                                href="{{ route('register') }}">{{ __('ui.register') }}</a>
                        </li>
                        <li class="nav-item  d-flex px-1">
                            <a class="nav-link nav-a text-light" href="{{ route('login') }}">Login</a>
                        </li>
                    </ul>
                </div>
            @endguest
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar -->
