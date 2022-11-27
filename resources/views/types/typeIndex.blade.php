<x-plantilla>

    <div class="container p-3">
        <h1 class="display-1">Habitaciones</h1>
    </div>

    @can('create', App\Models\Type::class)
    <div class="container p-3">
        <a href="/type/create" class="btn btn-primary">Crear nuevo tipo de habitación</a>
    </div>
    @endcan

    <div class="container p-3">
    
        @foreach ($types as $type)
            @foreach ($type->fotos as $foto)
            <div class="row g-0 bg-light position-relative shadow p-3 mb-5 bg-body rounded">
                <div class="col-md-6 mb-md-0 p-md-4">
                    <img src="{{ \Storage::url($foto->ubicacion) }}" class="w-100 rounded" alt="...">
                </div>
                <div class="col-md-6 p-4 ps-md-0">
                    <div class="d-flex justify-content-between">
                        <div class="p-2"><h1 class="mt-0 display-6">{{ $type->nombre }}</h1></div>
                        <div class="p-2"><h1 class="display-6">MXN ${{ $type->precio_noche }}</h1></div>
                    </div>
                    
                    <p>
                        <br>
                        <i class="bi bi-people-fill"></i> {{ $type->numero_personas }} personas <br>
                        </i><i class="bi bi-usb-mini-fill"></i> {{ $type->numero_camas < 2 ? $type->numero_camas . ' cama ' . $type->tipo_cama : $type->numero_camas . ' camas ' . $type->tipo_cama}} <br>
                        <br> {{ $type->descripcion }} <br>
                    </p>
                    <div class="d-flex justify-content-end">
                        <div class="p-2">
                            <a href="/type/{{ $type->id }}" class="stretched-link btn btn-dark">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endforeach
        
    </div>

</x-plantilla>