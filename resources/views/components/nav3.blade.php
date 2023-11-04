<nav class="navbar navbar-3 navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">
        <a class="titolo navbar-brand nav-name testo-nav" href="{{ route('homepage') }}">FindEasy</a>
        <button class="navbar-toggler testo-nav bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item px-1">
                    <a class="nav-link nav-a testo-nav" aria-current="page" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item px-1">
                    <a class="nav-link nav-a testo-nav" href="{{ route('announcements.index') }}">{{ __('ui.announcements') }}</a>
                </li>
                <li class="nav-item dropdown px-1">
                    <a class="nav-link nav-a testo-nav text-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('ui.categories') }}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li class="px-1"><a class="dropdown-item nav-a"
                                    href="{{ route('categories.show', compact('category')) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item px-1">
                    <div class="dropdown">
                        <a class=" dropdown-toggle nav-link nav-a testo-nav text-light" href="#" role="button"
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
                        <a class="nav-link nav-a testo-nav"
                            href="{{ route('announcements.create') }}">{{ __('ui.createAnnouncement') }}</a>
                    </li>


                </ul>
                <div class="d-flex justify-content-end align-items-center">
                    <ul class="navbar-nav me-auto" style="padding-right: 2.5rem">
                        @if (Auth::user()->is_revisor)
                            <li class="nav-item d-flex align-items-center px-1">
                                <a class="nav-link position-relative nav-a testo-nav" aria-current="page"
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
                        <li class="nav-item d-flex align-items-center px-1">
                            <div class="dropdown">
                            <a class="nav-link dropdown-toggle nav-a testo-nav text-light" href="#" id="#"
                                role="button" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item nav-a"
                                        href="{{ route('users.profile') }}">{{ __('ui.profile') }}</a></li>
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
                        </div>
                        </li>
                        <li class="nav-item d-flex px-1">
                            <button type="button" class="mx-3" style="background-color: transparent; border:none" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa-solid fa-magnifying-glass" style="color: white"></i>
                              </button>
                        </li>
                    </ul>
                </div>
            @endauth
            @guest
        </div>
                <div class="d-flex align-items-center justify-content-end" style="flex: 1; padding-right: 1rem ">
                    <ul class="navbar-nav me-auto justify-content-end d-flex" style="margin-right:0 !important">
                        <li class="nav-item d-flex px-1">
                            <a class="nav-link nav-a text-light"
                                href="{{ route('register') }}">{{ __('ui.register') }}</a>
                        </li>
                        <li class="nav-item d-flex px-1">
                            <a class="nav-link nav-a text-light" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item d-flex px-1">
                            <button type="button" class="mx-3" style="background-color: transparent; border:none" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa-solid fa-magnifying-glass" style="color: white"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            @endguest
        </div>
    </div>
</nav>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <ul class="d-flex flex-row pt-5 modal-content " style="list-style-type:none; width: 100%; background-color: transparent; border:none">
            <li class="me-3 me-lg-0" style="width: 100%">
                <form class="d-flex" role="search" action="{{ route('announcements.search') }}"
                method="GET">
                <input class="form-control me-2 text-light first-search" id="exampleModalLabel" style="width: 100%; border-radius:20px; background-color:#2D3142;"
                name="searched" type="search" placeholder="Search" aria-label="Search">
                <button class="button btn btn-hover"
                type="submit">{{ __('ui.search') }}</button>
                <button type="button" class="btn-close my-auto " data-bs-dismiss="modal" aria-label="Close" style="margin-left:5px"></button>
                </form>
            </li>

        </ul>
    </div>


</div>
