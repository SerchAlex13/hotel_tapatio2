<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSA Diseños</title>

    @vite(['resources/css/bootstrap.css', 'resources/js/bootstrapjs.js', 'resources/css/style.css'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
</head>
<body style="background-color:#f5f5f5;">

    {{-- Menú navbar --}}
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #003cff;">
        <div class="container-fluid">
            {{-- Icono --}}
            <a class="navbar-brand" href="/prenda">
                <i class="bi bi-tag-fill"></i>
                <span class="text-light">DSA Diseños</span>
            </a>
            {{-- Botón del menú --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Elementos del menú colapsable --}}
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item p-2">
                        <a class="nav-link active" href="#">Inicio</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="#">Precios</a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="nav-link" href="#">Servicios</a>
                    </li>
                    <li class="nav-item p-2 d-flex flex-fill">
                        <form class="d-flex" role="search">
                            <div class="input-group mb-2">
                                <input class="form-control" type="search" placeholder="Buscar" aria-label="Search" size="50">
                                <button class="btn btn-info" type="submit">Buscar</button>
                            </div>
                        </form>
                    </li>
                    <li class="nav-item dropdown p-2">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user() ? Auth::user()->name : 'Mi cuenta' }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/iniciar_sesion">Iniciar sesión</a></li>
                            <li><a class="dropdown-item" href="/perfil">Perfil</a></li>
                            <li><a class="dropdown-item" href="/registro_usuario">Regístrate</a></li>
                            @can('administrarUsuarios', App\Models\Prenda::class)
                            <li><a class="dropdown-item" href="/user">Administrar usuarios</a></li>
                            @endcan
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <div class="d-flex justify-content-center">
                                    <form class="p-2" method="POST" action="/logout">
                                        @csrf
                                        <input class="btn btn-outline-danger" type="submit" value="Cerrar sesión">
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item p-2">
                        <a href="/carrito" class="nav-link">Carrito</a>
                    </li>
                </ul>

                
{{-- 
                <form class="p-2" method="POST" action="/registro_usuario">
                    @csrf
                    <input class="btn btn-outline-light" type="submit" value="Regístrate">
                </form>

                <form class="p-2" method="POST" action="/logout">
                    @csrf
                    <input class="btn btn-outline-light" type="submit" value="LogOut">
                </form> --}}


            </div>
        </div>
    </nav>

    {{ $slot }}

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</body>
</html>