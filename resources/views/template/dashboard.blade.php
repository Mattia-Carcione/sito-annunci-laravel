<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('findeasy-logo.png')}}" type="image/x-icon">
    @livewireStyles
    <title>FindEasy.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    @vite(['resources\css\app.css', 'resources\js\app.js'])
    
    

</head>

<body>
    
        <nav class="navbar bg-body-tertiary fixed-top" data-bs-theme="dark"  >
            <div class="container-fluid">
              <a href="{{route('homepage')}}" class="navbar-brand titolo">FindEasy</a>
              <span class="navbar-brand">Area Revisor</span>
              <button class="navbar-toggler position-relative m-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="position-absolut top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ App\Models\Announcement::toBeRevisionedCount() }}
                    <span class="visually-hidden">Unread Messages</span>
                </span>
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="offcanvas offcanvas-end bg-dark text-light" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Revisor Menu</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{route('revisor.index')}}">Annunci da Revisionare</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('revisor.revised')}}">Annunci Revisionati</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{route('users.profile')}}">Profilo</a></li>
                          <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); getElementById('form').submit();">Logout</a></li>
                          <form id="form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                          
                        </ul>
                      </li>
                        
                    
                  </ul>
                  <form class="d-flex mt-3" role="search" action="{{route('revisor.search')}}" method="GET">
                    <input name="searched" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                </div>
              </div>
            </div>
          </nav>

    <main style="margin-top: 70px; padding-top: 30px">

            {{ $slot }}

    </main>

@livewireScripts
</body>

</html>