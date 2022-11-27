<x-plantilla titulo="Detalle de la Prenda">

    <div class="container p-3">
        <h1 class="display-1">{{ $room->numero }} - {{ $room->type->nombre }}</h1>
    </div>

    <div class="container d-flex justify-content-start">
        {{-- <div class="p-3">
            <a href="#" class="btn btn-info">Elegir habitación</a>
        </div> --}}
        <div class="p-3">
            <a href="/room" class="btn btn-dark">Regresar</a>
        </div>
    </div>

    <div class="container p-3 w-50">
        <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="true">
            <div class="carousel-indicators">
                @foreach ($room->type->fotos as $foto)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                {{-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> --}}
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($room->type->fotos as $foto)
                <div class="carousel-item active">
                    {{-- <li><a href="{{ route('descarga', $archivo) }}">{{ $archivo->nombre_original }}</a></li> --}}
                    <img src="{{ \Storage::url($foto->ubicacion) }}" class="rounded float-start d-block w-100" alt="">
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    

    

</x-plantilla>