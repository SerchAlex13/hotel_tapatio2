<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Tapatío</title>

    @vite(['resources/css/bootstrap.css', 'resources/js/bootstrapjs.js', 'resources/css/style.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-light navbar-expand-lg">
            <div class="container">
                <img class="logo" src="{{ \Storage::url('public/img/logo_black.png') }}" alt="logo">
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse justify-content-end" id="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item mb-3">
                            <a class="nav-link" href="#">Inicio</a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link" href="#row-nosotros">Conócenos</a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link" href="/type">Habitaciones</a>
                        </li>
                        @cannot('typeLogeado', App\Models\Type::class)
                        <li class="nav-item mb-3">
                            <a class="nav-link" href="/iniciar_sesion">Iniciar sesión</a>
                        </li>
                        <li class="nav-item mb-3">
                            <a class="nav-link" href="/registro_usuario">Registrarse</a>
                        </li>
                        @endcan
                        @can('typeLogeado', App\Models\Type::class)
                        <li class="nav-item mb-3">
                            <a class="nav-link" href="/user/profile">{{ \Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item mb-3">
                            <div>
                                <form class="p-1" method="POST" action="/logout">
                                    @csrf
                                    <input class="btn btn-outline-dark" type="submit" value="Cerrar sesión">
                                </form>
                            </div>
                        </li>
                        @endcan
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="title">
                <br><h1 class="display-1">Hotel Tapatío</h1>
                <p>Reserva en el mejor hotel de la ciudad</p><br>
                <a class="btn btn-custom mt-3" href="/type">Ver habitaciones</a>
            </div>
        </div>
    </header>
    <main>
        <div class="row text-white py-5" id="row-habitaciones">
            <div class="container text-center">
                <div class="d-flex justify-content-center">
                    <div class="col-md-8">
                        <h1 class="display-5">Habitaciones de lujo</h1>
                        <h5>Nuestras comodidades y servicios te harán vivir una experiencia inigualable.</h5>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <img class="w-50" src="{{ \Storage::url('public/img/interior2_sala.jpg') }}" alt="interior_sala">
                        <h4 class="font-weight-bold mt-4">Comodidad</h4>
                        <p>Disfruta de nuestras habitaciones equipadas con muebles de primera calidad.</p>
                    </div>
                    <div class="col">
                        <img class="w-50" src="{{ \Storage::url('public/img/interior2_cocina.jpg') }}" alt="interior_cocina">
                        <h4 class="font-weight-bold mt-4">Servicios</h4>
                        <p>Quítate de preocupaciones y disfruta de todos nuestras amenidades.</p>
                    </div>
                    <div class="col">
                        <img class="w-50" src="{{ \Storage::url('public/img/exterior2_sala.jpg') }}" alt="exterior_sala">
                        <h4 class="font-weight-bold mt-4">Todo tipo de habitaciones</h4>
                        <p>Explora nuevas formas de hospedaje.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-5" id="row-nosotros">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 text-center">
                        <img class="w-100" src="{{ \Storage::url('public/img/hotel_tapatio-logos_white.png') }}" alt="hotel_fachada2">
                    </div>
                    <div class="col-md-7 text-center">
                        <br><br><br><br><br>
                        <h1 class="title-color mb-5 display-4">Sobre nosotros</h1>
                        <div class="p-color">
                            <p>Hotel Tapatío es una cadena hotelera de 5 estrellas nacida en la ciudad de Guadalajara que siempre está en busca de mejorar la experiencia de sus huéspedes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="row text-white">
            <div class="container">
                <div class="row gy-5">
                    <div class="col-lg-4 px-5">
                        <h4 class="mb-4">Navega</h4>
                        <a class="nav-link link-info" href="/type">Habitaciones</a>
                    </div>
                    <div class="col-lg-4 px-5">
                        <h4 class="mb-4">Contáctanos</h4>
                        <div class="d-flex">
                            <i class="bi bi-telephone-fill"></i>
                            <p>01 2345 6789</p>
                        </div>
                        <div class="d-flex">
                            <i class="bi bi-house-fill"></i>
                            <p>C. Tapatía #123</p>
                        </div>
                        <div class="d-flex">
                            <i class="bi bi-envelope-fill"></i>
                            <p>hotel_tapatio@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-lg-4 px-5">
                        <h4 class="mb-4">Créditos</h4>
                        <p>
                            <a class="nav-link link-light" href="https://www.freepik.com/free-photo/low-angle-shot-facade-white-modern-building-blue-clear-sky_17465724.htm#query=low-angle-shot-facade-white-modern-building-blue-clear-sky&position=0&from_view=search&track=sph">Image by wirestock on Freepik</a>
                            <a class="nav-link link-light" href="https://www.freepik.com/free-photo/empty-flat-interrior-with-elements-decoration_10025719.htm?query=hotel%20lobby&collectionId=691540&&position=25&from_view=collections">Image by senivpetro on Freepik</a>
                            <a class="nav-link link-light" href="https://www.freepik.com/free-photo/interior-spacious-kitchen-with-concrete-wall-3d-rendering_14441843.htm?query=hotel%20lobby&collectionId=691540&&position=10&from_view=collections">Image by vanitjan on Freepik</a>
                            <a class="nav-link link-light" href="https://www.freepik.com/free-photo/modern-spacious-room-with-large-panoramic-window_13908610.htm?query=hotel%20lobby&collectionId=691540&page=2&position=16&from_view=collections">Image by serhii_bobyk on Freepik</a>
                            <a class="nav-link link-light" href="https://www.freepik.com/free-photo/interior-living-room-with-sofa-empty-dark-blue-wall-3d-rendering_14872564.htm?query=hotel%20lobby&collectionId=691540&&position=9&from_view=collections">Image by vanitjan on Freepik</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>