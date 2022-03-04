<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid main">
        <header class="row">
        <nav class="navbar fixed-top navbar-light bg-light bg-opacity-75">
            <div class="container-fluid">
                <div class="dropdown">
                <a class="dropdown text-dark" href="#" role="button" id="dropdownPerfil" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownPerfil">
                    <li class="dropdown-item active">{{Auth::user()->name}}</li>
                    <li><a class="dropdown-item" href="#">Ver perfil</a></li>
                    <li><a class="dropdown-item" href="{{route('producto.create')}}">Añadir Producto</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="{{ route('logout') }}">Cerrar Session</a></li>
                </ul>
                </div>
                <a class="nav-link text-dark h4" href="#">Hosteleria Mendizorrotza</a>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </div>
            </div>
        </nav>
        </header>
        <div class="row bg-secondary bg-opacity-25 mt-5">
            @yield('contenedor')
        </div>
        <footer class="row">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <div>
                    <a class="navbar-brand text-white py-1">Manual aplicacion</a>
                </div>
                <div>
                    <a class="navbar-brand text-white py-1">Contenido Copyrigth</a>
                </div>
                </div>
            </div>
        </nav>
        </footer>
    </div>
</body>
</html>