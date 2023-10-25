<nav class="navbar navbar-expand-lg navbar-color-personal text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('homepage') }}">FindEasy</a>
        <button class="navbar-toggler text-uppercase font-weight-bold text-secondary-emphasis rounded" style="background-color: #C5DCDC" type="button"
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
                    <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('announcements.index') }}">{{__('ui.announcements')}}</a>
                </li>
                <li class="nav-item mx-0 mx-lg-1 align-items-center d-flex">

                    <div class="dropdown">
                        <a class=" dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ __('ui.categories') }}
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
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('register') }}">{{__('ui.register')}}</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('login') }}">Login</a>
                    </li>
                @endguest

                @auth
                    
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="{{ route('announcements.create') }}">{{__('ui.createAnnouncement')}}</a>
                    </li>

                    @if (Auth::user()->is_revisor)
                        <li class="nav-item mx-0 mx-lg-1 d-flex align-items-center">
                            <a class="nav-link position-relative" aria-current="page" href="{{ route('revisor.index') }}" id="navbar" role="button">{{__('ui.revisorZone')}}</a>
                                <span class="position-absolut top-0 start-100 translate-middle badge rounded-pill" style="background-color: #C5DCDC">
                                    {{ App\Models\Announcement::toBeRevisionedCount() }}
                                    <span class="visually-hidden">Unread Messages</span>
                                </span>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item mx-0 mx-lg-1 d-flex align-items-center dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="#" role="button" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">{{__('ui.profile')}}</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); getElementById('form').submit();">
                                Logout</a></li>
                                <form id="form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                          </ul>
                    </li>
                @endauth

                <div class="dropdown">
                    <a class=" dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('ui.language') }}
                    </a>

                    <ul class="dropdown-menu">
                        
                        <li>
                            <x-_locale lang='it' nation='it'/>
                        </li>

                        <li>
                            <x-_locale lang='en' nation='gb'/>
                        </li>

                        <li>
                            <x-_locale lang='es' nation='es'/>
                        </li>

                    </ul>
                </div>
            </ul>
            <form class="d-flex" role="search" action="{{route('announcements.search')}}" method="GET">
                <input class="form-control me-2" name="searched" type="search" placeholder="Search" aria-label="Search">
                <button class="btn" style="background-color: #C5DCDC" type="submit">{{__('ui.search')}}</button>
            </form>
        </div>
    </div>
</nav>
