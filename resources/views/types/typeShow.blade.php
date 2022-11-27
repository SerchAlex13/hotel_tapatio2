<x-plantilla titulo="Detalle de la Prenda">

    <div class="container p-3">
        <h1 class="display-1">{{ $type->nombre }}</h1>
    </div>

    <div class="container p-3 w-50">
        <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="true">
            <div class="carousel-indicators">
                @foreach ($type->fotos as $foto)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                {{-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> --}}
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($type->fotos as $foto)
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

    <div class="container col-md-6 p-4 ps-md-0">
        <div class="d-flex justify-content-between">
            <div class="p-2"><h1 class="display-6">MXN ${{ $type->precio_noche }}</h1></div>
        </div>
        
        <p>
            <br>
            <i class="bi bi-people-fill"></i> {{ $type->numero_personas }} personas <br>
            </i><i class="bi bi-usb-mini-fill"></i> {{ $type->numero_camas < 2 ? $type->numero_camas . ' cama ' . $type->tipo_cama : $type->numero_camas . ' camas ' . $type->tipo_cama}} <br>
            <br> {{ $type->descripcion }} <br>
        </p>
    </div>

    <div class="container d-flex justify-content-center">
        <div class="p-3">
            <a href="/reservation/create" class="btn btn-info">Reservar</a>
        </div>
        <div class="p-3">
            <a href="/type" class="btn btn-dark">Regresar</a>
        </div>
        @can('update', $type)
        <div class="p-3">
            <a href="/type/{{ $type->id }}/edit" class="btn btn-warning">Editar tipo de habitación</a>
        </div>
        @endcan
        @can('delete', $type)
        <div class="p-3">
            <form action="/type/{{ $type->id }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Borrar habitación" class="btn btn-danger">
            </form>
        </div>
        @endcan
    </div>

</x-plantilla>