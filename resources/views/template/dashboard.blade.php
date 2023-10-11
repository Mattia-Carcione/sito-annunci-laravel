<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @livewireStyles
    <title>FindEasy.com</title>
    @vite(['resources\css\app.css', 'resources\js\app.js'])
    
    

</head>

<body>
    <nav class="navbar sticky-top fixed-top bg-dark flex-md-nowrap p-0 shadow d-md-none" data-bs-theme="dark"
    style="">
    <a href="{{ route('homepage') }}" class="d-inline-flex align-items-center py-1 link-body-emphasis text-decoration-none">
        <img class="bi rounded" src="\book.jpg" width="40" height="32" role="img">
        <span class="fs-4 fw-bold">Bookstore</span>
    </a>

    <ul class="navbar-nav flex-row d-md-none">
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu"
                aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation"><i
                    class="fa-solid fa-bars" style="color: #ffffff;"></i>
            </button>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-secondary-subtle pt-md-3">
            <div class="offcanvas-md offcanvas-end bg-secondary-subtle" tabindex="-1" id="sidebarMenu"
                aria-labelledby="sidebarMenuLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="sidebarMenuLabel">Bookstore</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                        aria-label="Close">
                    </button>
                </div>

                <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                    <ul class="nav flex-column">
                        <li class="nav-item " aria-current="page">
                            {{-- <a class="nav-link @if (Route::currentRouteName() == 'profile') rounded-end bg-secondary w-50 text-light disabled @endif d-flex align-items-center gap-2 active text-dark w-50 link-dash"
                                aria-current="page" href="{{ route('profile') }}">
                                Profilo
                            </a> --}}
                        </li>

                        <h6
                            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-2 text-dark text-uppercase">
                            <span>Prodotti</span>
                        </h6>

                        <li class="nav-item">
                            {{-- <a class="nav-link d-flex align-items-center gap-2 text-dark w-50 link-dash @if (Route::currentRouteName() == 'dashboard') rounded-end bg-secondary w-50 text-light disabled @endif"
                                href="{{ route('dashboard') }}">
                                Libri
                            </a> --}}
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 text-dark w-50 link-dash @if (Route::currentRouteName() == 'homepage') rounded-end bg-secondary w-50 text-light disabled @endif"
                                href="{{ route('homepage') }}">Autori
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 text-dark w-50 link-dash @if (Route::currentRouteName() == 'homepage') rounded-end bg-secondary w-50 text-light disabled @endif"
                                href="{{ route('homepage') }}">Categorie
                            </a>
                        </li>
                    </ul>

                    <ul class="nav flex-column mb-auto">

                    </ul>

                    <hr class="my-3 border border-white text-light bg-light">

                    <ul class="nav flex-column mb-auto">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 text-dark w-50 link-dash"
                                href="{{ route('homepage') }}">
                                Bookstore
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('POST')
                                <a class="nav-link d-flex align-items-center gap-2 w-50 link-dash"
                                    onclick="event.preventDefault(); this.closest('form').submit();" type="submit">
                                    Esci
                                </a> --}}
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100">
            <nav class="container-md-fluid py-4">
                <div class="d-flex flex-wrap align-items-center justify-content-between py-1 mb-1 border-bottom">
                    <div class="col-md-3 mb-md-0 text-start d-none d-md-block">
                        <a href="{{ route('homepage') }}"
                            class="d-inline-flex align-items-center link-body-emphasis text-decoration-none">
                            <img class="bi rounded" src="\book.jpg" width="40" height="32" role="img">
                            <span class="fs-4 fw-bold">Bookstore</span>
                        </a>
                    </div>

                    {{-- <form class=" col-md-3 text-end" action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('POST')
                        <span class="text-dark px-1">
                            Ciao,
                        </span>

                        <a href="{{ route('profile') }}"
                            class="d-inline-flex link-body-emphasis text-decoration-none auth-link">
                            <span>
                                {{ Auth::user()->name }}
                            </span>
                        </a>

                        <a onclick="event.preventDefault(); this.closest('form').submit();" type="submit">
                            <i class="fa-solid fa-arrow-right-from-bracket i-link-custom" style="color: black;"></i>
                        </a>
                    </form> --}}
                </div>
            </nav>

            {{ $slot }}

        </main>
    </div>
</div>
@livewireScripts
</body>

</html>